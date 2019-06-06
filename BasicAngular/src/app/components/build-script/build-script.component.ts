import { Component, OnInit, Inject, Input, Output, EventEmitter, ViewChild } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { getDefaultService } from 'selenium-webdriver/chrome';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { EditServiceService } from 'src/app/edit-service.service';
import { MatDialog, MAT_DIALOG_DATA, MatDialogRef } from '@angular/material';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { HttpResponse } from '@angular/common/http';
import { PopoverConfig } from 'ngx-bootstrap';
import { CommandExecutorService } from '../common/services/command-executor.service';
import { MessageService } from '../common/services/message.service';
import * as Utils from '../common/utils/ngx-editor.utils';

@Component({
  selector: 'app-ngx-editor-toolbar',
  templateUrl: './ngx-editor-toolbar.component.html',
  styleUrls: ['./ngx-editor-toolbar.component.scss'],
  providers: [PopoverConfig]
})

export class NgxEditorToolbarComponent implements OnInit {
  /** holds values of the insert link form */
  urlForm: FormGroup;
  /** holds values of the insert image form */
  imageForm: FormGroup;
  /** holds values of the insert video form */
  videoForm: FormGroup;
  /** set to false when image is being uploaded */
  uploadComplete = true;
  /** upload percentage */
  updloadPercentage = 0;
  /** set to true when the image is being uploaded */
  isUploading = false;
  /** which tab to active for color insetion */
  selectedColorTab = 'textColor';
  /** font family name */
  fontName = '';
  /** font size */
  fontSize = '';
  /** hex color code */
  hexColor = '';
  /** show/hide image uploader */
  isImageUploader = false;

  /**
   * Editor configuration
   */
  @Input() config: any;
  @ViewChild('urlPopover') urlPopover;
  @ViewChild('imagePopover') imagePopover;
  @ViewChild('videoPopover') videoPopover;
  @ViewChild('fontSizePopover') fontSizePopover;
  @ViewChild('colorPopover') colorPopover;
  /**
   * Emits an event when a toolbar button is clicked
   */
  @Output() execute: EventEmitter<string> = new EventEmitter<string>();

  constructor(private _popOverConfig: PopoverConfig,
    private _formBuilder: FormBuilder,
    private _messageService: MessageService,
    private _commandExecutorService: CommandExecutorService) {
    this._popOverConfig.outsideClick = true;
    this._popOverConfig.placement = 'bottom';
    this._popOverConfig.container = 'body';
  }

  /**
   * enable or diable toolbar based on configuration
   *
   * @param value name of the toolbar buttons
   */
  canEnableToolbarOptions(value): boolean {
    return Utils.canEnableToolbarOptions(value, this.config['toolbar']);
  }

  /**
   * triggers command from the toolbar to be executed and emits an event
   *
   * @param command name of the command to be executed
   */
  triggerCommand(command: string): void {
    this.execute.emit(command);
  }

  /**
   * create URL insert form
   */
  buildUrlForm(): void {
    this.urlForm = this._formBuilder.group({
      urlLink: ['', [Validators.required]],
      urlText: ['', [Validators.required]],
      urlNewTab: [true]
    });
  }

  /**
   * inserts link in the editor
   */
  insertLink(): void {
    try {
      this._commandExecutorService.createLink(this.urlForm.value);
    } catch (error) {
      this._messageService.sendMessage(error.message);
    }

    /** reset form to default */
    this.buildUrlForm();
    /** close inset URL pop up */
    this.urlPopover.hide();
  }

  /**
   * create insert image form
   */
  buildImageForm(): void {
    this.imageForm = this._formBuilder.group({
      imageUrl: ['', [Validators.required]]
    });
  }

  /**
   * create insert image form
   */
  buildVideoForm(): void {
    this.videoForm = this._formBuilder.group({
      videoUrl: ['', [Validators.required]],
      height: [''],
      width: ['']
    });
  }

  /**
   * Executed when file is selected
   *
   * @param e onChange event
   */
  onFileChange(e): void {
    this.uploadComplete = false;
    this.isUploading = true;

    if (e.target.files.length > 0) {
      const file = e.target.files[0];

      try {
        this._commandExecutorService.uploadImage(file, this.config.imageEndPoint).subscribe(event => {

          if (event.type) {
            this.updloadPercentage = Math.round(100 * event.loaded / event.total);
          }

          if (event instanceof HttpResponse) {
            try {
              this._commandExecutorService.insertImage(event.body.url);
            } catch (error) {
              this._messageService.sendMessage(error.message);
            }
            this.uploadComplete = true;
            this.isUploading = false;
          }
        });
      } catch (error) {
        this._messageService.sendMessage(error.message);
        this.uploadComplete = true;
        this.isUploading = false;
      }
    }
  }

  /** insert image in the editor */
  insertImage(): void {
    try {
      this._commandExecutorService.insertImage(this.imageForm.value.imageUrl);
    } catch (error) {
      this._messageService.sendMessage(error.message);
    }

    /** reset form to default */
    this.buildImageForm();
    /** close inset URL pop up */
    this.imagePopover.hide();
  }

  /** insert image in the editor */
  insertVideo(): void {
    try {
      this._commandExecutorService.insertVideo(this.videoForm.value);
    } catch (error) {
      this._messageService.sendMessage(error.message);
    }

    /** reset form to default */
    this.buildVideoForm();
    /** close inset URL pop up */
    this.videoPopover.hide();
  }

  /** inser text/background color */
  insertColor(color: string, where: string): void {
    try {
      this._commandExecutorService.insertColor(color, where);
    } catch (error) {
      this._messageService.sendMessage(error.message);
    }

    this.colorPopover.hide();
  }

  /** set font size */
  setFontSize(fontSize: string): void {
    try {
      this._commandExecutorService.setFontSize(fontSize);
    } catch (error) {
      this._messageService.sendMessage(error.message);
    }

    this.fontSizePopover.hide();
  }

  /** set font Name/family */
  setFontName(fontName: string): void {
    try {
      this._commandExecutorService.setFontName(fontName);
    } catch (error) {
      this._messageService.sendMessage(error.message);
    }

    this.fontSizePopover.hide();
  }

  ngOnInit() {
    this.buildUrlForm();
    this.buildImageForm();
    this.buildVideoForm();
  }
}















//below is orignal code

interface DialogData {
  name: string;
  category: string;
  subcategory: string;
  description:string; 
}
interface scriptData {
  questionId: any; 
  scriptId: any;
}


@Component({
  selector: 'app-build-script',
  templateUrl: './build-script.component.html',
  styleUrls: ['./build-script.component.scss']
})
export class BuildScriptComponent implements OnInit {
  scriptName: string;
  category: string;
  subcategory: string;
  readonly URL = 'localhost::3000/test'
  posts: any;
  submitted = false;
  success = false;
  response: scriptData;
  scriptData1 = {} as scriptData;

  scriptForm: FormGroup;
  scriptId: any;
  usersId: any;
  texts: any;
  answer = 1;
  saved = false;
  submit = false;
  private answers: string[] = [];
  questionId: any;
  loggedIn = false;
  tempAnswer: any;
  description: string;
  savedCount = 0;
  //questionForm: FormGroup;
  htmlContent = '';

  constructor(public dialog: MatDialog, private Auth: AuthService, private formBuilder: FormBuilder, private Http: HttpClient, private router: Router,private editService: EditServiceService, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry,_popOverConfig: PopoverConfig, _formBuilder: FormBuilder, _messageService: MessageService, _commandExecutorService: CommandExecutorService) { 
   
    iconRegistry.addSvgIcon(
      'answer',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron.svg'));
    iconRegistry.addSvgIcon(
      'remove',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/red-cross.svg'));
    // iconRegistry.addSvgIcon(
    //   'record',
    //  sanitizer.bypassSecurityTrustResourceUrl('../assets/img/microphone-solid.svg'));
    // iconRegistry.addSvgIcon(
    //   'pause',
    //   sanitizer.bypassSecurityTrustResourceUrl('../assets/img/pause-solid.svg'));
    // iconRegistry.addSvgIcon(
    //   'stop',
    //   sanitizer.bypassSecurityTrustResourceUrl('../assets/img/stop-solid.svg'));
    iconRegistry.addSvgIcon(
      'bold',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/bold-solid.svg'));
    iconRegistry.addSvgIcon(
      'italic',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/italic-solid.svg'));
    iconRegistry.addSvgIcon(
      'underline',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/underline-solid.svg'));
    iconRegistry.addSvgIcon(
      'bullet',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/bulletpoint-solid.svg'));
    iconRegistry.addSvgIcon(
       'numbering',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/numbering-solid.svg'));
    iconRegistry.addSvgIcon(
        'font',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/font-solid.svg'));
      iconRegistry.addSvgIcon(
        'add',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/plus-circle-solid.svg'));
    }
 

  Submit() {

    console.log("yes");
    //console.log(this.scriptForm.value)
    //console.log(this.questionForm.value)
    for (let i = 0; i < this.answers.length; i++) {
      console.log(this.answers[i]);

    }
    
    if (this.scriptId == null) {
      console.log(this.texts);

      this.Auth.sendScript<scriptData>(this.scriptName, this.category,this.subcategory, this.description, this.texts, this.answers);
     

     
    }

    this.success = true;
    this.submit = true;
    this.saved = true;
    

  }

  ngOnInit() {
    
    this.loggedIn = this.Auth.loggedIn;
    this.questionId = '';
    this.usersId = this.Auth.getId;
  }

  addAnswer() {
    if (this.answer >= 9) {
      alert('Maximum count reached');
    } else {
      this.answer++;
    }

  }
  removeAnswer() {
    if (this.answer <= 1) {
      alert('Maximum count reached');
    } else {
      this.answers[this.answer - 1] = '';
      this.answer--;
    }

  }
  nextQuestion(selectedAnswer,num) {
    this.savedCount = 1;
    this.saved = false;
    this.answer = 1;
    this.texts = '';
    this.submitted = true;
    this.tempAnswer = this.answers[num];
    for (let i = 0; i < this.answers.length; i++){
      this.answers[i] = "";

    }
    //console.log('questionId: '+ this.questionId);

  }
  isSubmited(){
    return this.saved
  }
  submitAnswer(){
    console.log('ques:' + this.response )
    this.scriptData1.questionId = this.Auth.scriptData1.questionId;
    this.scriptData1.scriptId = this.Auth.scriptData1.scriptId;
        console.log('ques: ' + this.questionId + 'scri' + this.scriptId)
    this.Auth.submitAnswer( this.scriptData1.questionId, this.scriptData1.scriptId, this.answers, this.texts, this.tempAnswer)
    this.saved = true;
  }

  openDialog() {
    if (!this.submit ) { 
      
    
    const dialogRef = this.dialog.open(DialogForm,{
      width: '700px'
    });
    
    dialogRef.afterClosed().subscribe(result => {
      

      this.scriptName= result.name;
      this.category= result.category;
      this.subcategory = result.subcategory;
      this.description = result.description;
      console.log('Dialog result:' + result.name);
      console.log('Dialog result:' + result.category);
      console.log('Dialog result:' + result.subcategory);
      this.Submit()
    });
  }
  else{
    this.submitAnswer();
  }
  
}
}

@Component({
  selector: 'DialogForm',
  templateUrl: 'DialogForm.html',
  styleUrls: ['./DialogForm.scss']
})
export class DialogForm implements OnInit{
  



  name: string;
  category: string;
  subcategory: string;
  description:string;
  constructor(public dialogRef: MatDialogRef<DialogForm>, @Inject(MAT_DIALOG_DATA) public data: DialogData  ){
    dialogRef.disableClose = true;
  }
  
  ngOnInit() {
    this.name = ""
    this.category =""
    this.subcategory =""
    this.description =""
  }

  
  closeDialog() {
    if( this.description != "" &&this.category !="" &&  this.subcategory != "" && this.name != ""){
      let data1 = {description: this.description, category:this.category, subcategory:this.subcategory, name:this.name}
      console.log(this.subcategory)
      console.log(this.category)
      //this.data.category = this.category;
      //this.data.subcategory = this.subcategory;
      //this.data.name = this.name;
      this.dialogRef.close(data1);
    }else{
      alert('Please Complete All fields')
    }
 
  }


  

}
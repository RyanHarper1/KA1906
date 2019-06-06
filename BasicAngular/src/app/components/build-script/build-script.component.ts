import { Component, OnInit, Inject } from '@angular/core';
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

  constructor(public dialog: MatDialog, private Auth: AuthService, private formBuilder: FormBuilder, private Http: HttpClient, private router: Router,private editService: EditServiceService, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) { 
   
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
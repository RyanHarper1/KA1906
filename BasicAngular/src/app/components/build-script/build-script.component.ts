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
  description: string;
}
interface scriptData {
  questionId: any;
  scriptId: any;
}
interface answerData {
  texts: any;
  questionId: any
  nextQuestionId: any
  idanswer: any
}
interface questionData {
  questionId: any

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
  response2: any
  scriptForm: FormGroup;
  scriptId: any;
  usersId: any;
  texts: any;
  answer = 1;
  saved = false;
  submit = false;

  answers: answerData[]
  questionId: any;
  loggedIn = false;
  tempAnswer: any;
  description: string;
  savedCount = 0;

  selectedAnswer: any;
  previousAnswers: any[];
  previousAnswerCount = 0;
  question: any;
  response1: any;
  loadedScript = false;
  tempQuestionId: any;
  //questionForm: FormGroup;

  constructor(public dialog: MatDialog, private Auth: AuthService, private formBuilder: FormBuilder, private Http: HttpClient, private router: Router, private editService: EditServiceService, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) {

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
    iconRegistry.addSvgIcon(
      'save',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/save-regular.svg'));
    iconRegistry.addSvgIcon(
      'back',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/back-btn.svg'));
  }


  Submit() {

    console.log("yes");
    //console.log(this.scriptForm.value)
    //console.log(this.questionForm.value)
    for (let i = 0; i < this.answers.length; i++) {
      console.log(this.answers[i].texts);

    }

    if (this.scriptId == null) {
      console.log(this.texts);

      this.Auth.sendScript<scriptData>(this.scriptName, this.category, this.subcategory, this.description, this.texts, this.answers);



    }

    this.success = true;
    this.submit = true;
    this.saved = true;


  }

  ngOnInit() {
    this.previousAnswers = []
    this.answers = []
    for (let i = 0; i < 9; i++) {
      this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
    }
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
      this.answers[this.answer - 1].texts = "";
      this.answer--;
    }

  }
  nextQuestion(object, num) {
    if (this.previousAnswerCount == 0) {
      this.questionId = this.Auth.scriptData1.questionId
    }

    this.scriptId = this.Auth.scriptData1.scriptId
    this.tempAnswer = this.answers[num].texts;
    console.log('temp answer ' + this.tempAnswer)
    if (this.answers[num].nextQuestionId != null) {
      this.loadedScript = true;
      console.log('previous:' + this.previousAnswers[this.previousAnswerCount])

      this.questionId = Number(this.answers[num].questionId)
      this.previousAnswers[this.previousAnswerCount] = Number(this.questionId);
      this.previousAnswerCount++;
      console.log(Number(this.questionId))
      this.answer = 0;
      let quest = this.Http.post('http://localhost:3000/get-question', { questionId: Number(this.answers[num].nextQuestionId) });
      quest.subscribe((response1) => {
        console.log('response1: ' + response1[0].texts)
        this.texts = response1[0].texts;
        this.questionId = response1[0].questionId;
        // get answers
        let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: Number(this.answers[num].nextQuestionId) });
        ans.subscribe((response2) => {
          let tempAnswers = response2;
          for (let i = 0; i < 9; i++) {
            this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
          }
          for (let i = 0; i < (<any>tempAnswers).length; i++) {
            this.answers[i] = tempAnswers[i]
            console.log('answer responses: ' + this.answers[i].texts);
            this.answer++;
          }
        });
      });


    }
    else {
      this.loadedScript = false;
      console.log('no next question linked')
      this.previousAnswers[this.previousAnswerCount] = Number(this.questionId);
      this.tempQuestionId = this.questionId;
      this.questionId = null;



      this.previousAnswerCount++;
      for (let i = 0; i < 9; i++) {
        this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }

      }


      this.answer = 1;
      this.texts = " "

    }

  }
  isSubmited() {
    return this.saved
  }
  submitAnswer() {
    console.log('ques:' + this.response)
    this.scriptData1.questionId = this.Auth.scriptData1.questionId;
    this.scriptData1.scriptId = this.Auth.scriptData1.scriptId;
    console.log('ques: ' + this.questionId + 'scri' + this.scriptId)
    this.Auth.submitAnswer(this.scriptData1.questionId, this.scriptData1.scriptId, this.answers, this.texts, this.tempAnswer)
    this.saved = true;
  }

  openDialog() {
    if (!this.submit) {


      const dialogRef = this.dialog.open(DialogForm, {
        width: '700px'
      });

      dialogRef.afterClosed().subscribe(result => {


        this.scriptName = result.name;
        this.category = result.category;
        this.subcategory = result.subcategory;
        this.description = result.description;
        console.log('Dialog result:' + result.name);
        console.log('Dialog result:' + result.category);
        console.log('Dialog result:' + result.subcategory);
        this.Submit()
      });
    }
    else {

      if (this.questionId == null) {
        console.log('ques: ' + this.questionId + 'scri' + this.scriptId)
        //let sql = this.Auth.submitEditAnswer(this.questionId, this.scriptId, this.answers, this.question, this.tempAnswer)
        console.log('It is trying to submit answer')
        let request = this.Http.post<questionData>('http://localhost:3000/addQuestion', { texts: this.texts, scriptId: this.scriptId });
        request.subscribe((response1) => {
          console.log('response1: ' + response1)
          this.response1 = response1;
          console.log('response1: ' + response1.questionId)
          this.scriptData1.questionId = response1.questionId;

          //insert answers
          for (let i = 0; i < this.answers.length; i++) {
            if (this.answers[i].texts != "") {
              let ans = this.Http.post<questionData>('http://localhost:3000/addAnswer', { texts: this.answers[i].texts, questionId: response1.questionId });
              ans.subscribe((response2) => {
                this.response2 = response1
                console.log('answer responses: ' + response2);

              });
            }
          }
          console.log('selected answer: ' + this.tempAnswer)
          let update = this.Http.post('http://localhost:3000/updateAnswer', { nextQuestionId: response1.questionId, questionId: this.tempQuestionId, texts: this.tempAnswer });
          update.subscribe((response2) => {
            this.questionId = response1.questionId
            let quest = this.Http.post('http://localhost:3000/get-question', { questionId: this.questionId });
            quest.subscribe((response1) => {
              console.log('response1: ' + response1[0].texts)
              this.texts = response1[0].texts;

              //get answers
              let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: this.questionId });
              ans.subscribe((response2) => {
                let tempAnswers = response2;
                this.answer = 0;
                for (let i = 0; i < (<any>tempAnswers).length; i++) {
                  this.answers[i] = tempAnswers[i]
                  console.log('answer responses: ' + this.answers[i].texts);
                  this.answer++;
                }
                this.loadedScript = true;

              });
            });
          });


        });
        //this.saved = true;

      } else {
        let update = this.Http.post('http://localhost:3000/update-script', { questionId: this.questionId, question: this.texts })
        update.subscribe((result) => {
          console.log(result)
          console.log('THIS IS GOING TO WORK')
          for (let j = 0; j < this.answer; j++) {
            if (this.answers[j].texts != "") {
              console.log('THIS IS GOING TO WORK: ' + this.answers, this.answers[j].texts)

              let send = this.Http.post<questionData>('http://localhost:3000/editAnswer', { texts: this.answers[j].texts, questionId: this.questionId, nextQuestionId: this.answers[j].nextQuestionId });
              send.subscribe((res) => {
                //console.log('THIS IS WHAT HAS RERTUEND: ' + res.result)
              });

            }
          }
        });
      }
    }

  }
  backQuestion() {
    this.answer = 0;
    let quest = this.Http.post('http://localhost:3000/get-question', { questionId: this.previousAnswers[this.previousAnswerCount - 1] });
    quest.subscribe((response1) => {
      console.log('response1: ' + response1[0].texts)
      this.texts = response1[0].texts;
      this.questionId = response1[0].questionId;
      // get answers
      let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: this.previousAnswers[this.previousAnswerCount - 1] });
      ans.subscribe((response2) => {
        let tempAnswers = response2;
        for (let i = 0; i < 9; i++) {
          this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
        }
        for (let i = 0; i < (<any>tempAnswers).length; i++) {
          this.answers[i] = tempAnswers[i]
          console.log('answer responses: ' + this.answers[i].texts);
          this.answer++;
        }
        this.previousAnswerCount--;

      });
    });

  }
}

@Component({
  selector: 'DialogForm',
  templateUrl: 'DialogForm.html',
  styleUrls: ['./DialogForm.scss']
})
export class DialogForm implements OnInit {




  name: string;
  category: string;
  subcategory: string;
  description: string;
  constructor(public dialogRef: MatDialogRef<DialogForm>, @Inject(MAT_DIALOG_DATA) public data: DialogData) {
    dialogRef.disableClose = true;
  }

  ngOnInit() {
    this.name = ""
    this.category = ""
    this.subcategory = ""
    this.description = ""
  }


  closeDialog() {
    if (this.description != "" && this.category != "" && this.subcategory != "" && this.name != "") {
      let data1 = { description: this.description, category: this.category, subcategory: this.subcategory, name: this.name }
      console.log(this.subcategory)
      console.log(this.category)
      //this.data.category = this.category;
      //this.data.subcategory = this.subcategory;
      //this.data.name = this.name;
      this.dialogRef.close(data1);
    } else {
      alert('Please Complete All fields')
    }

  }


}

import { Component, OnInit } from '@angular/core';
import { EditServiceService } from 'src/app/edit-service.service';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { stringify } from 'querystring';
import { AuthService } from 'src/app/auth.service';

interface questionData {
  questionId: any

}
interface answerData {
  texts: any;
  questionId: any
  nextQuestionId: any
  idanswer: any
}
interface scriptData {
  questionId: any; 
  scriptId: any;
}
@Component({
  selector: 'app-edit-script',
  templateUrl: './edit-script.component.html',
  styleUrls: ['./edit-script.component.scss']
})
export class EditScriptComponent implements OnInit {
  scriptId: any;
  scriptName: any;
  response: any
  category: any;
  questionId: any;
  question: any;
  answers: answerData[]//{idanswer: Number, texts: String, questionId: Number, nextQuestionId: Number}
  answer = 0;
  selectedAnswer: any;
  previousAnswers: any[];
  previousAnswerCount = 0;
  scriptData1 = {} as scriptData;
  tempAnswer: any;

  constructor(private editService: EditServiceService, private Http: HttpClient, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry, private Auth: AuthService) {

    iconRegistry.addSvgIcon(
      'answer',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron.svg'));
    iconRegistry.addSvgIcon(
      'remove',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/red-cross.svg'));
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

  ngOnInit() {
    this.previousAnswers = []
    this.answers = []
    for (let i = 0; i < 9; i++) {
      this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
    }

    this.scriptId = this.editService.getEditScript();
    this.getScript(this.scriptId);
  }

  getScript(scriptId) {
    //get script
    let query = this.Http.post('http://localhost:3000/get-script', { scriptId: scriptId });
    query.subscribe((response) => {
      console.log('response to this is: ' + response)
      this.response = response;
      this.category = response[0].category;
      this.scriptName = response[0].scriptName;
      this.questionId = response[0].firstQuestionId;


      //get question
      let quest = this.Http.post('http://localhost:3000/get-question', { questionId: this.questionId });
      quest.subscribe((response1) => {
        console.log('response1: ' + response1[0].texts)
        this.question = response1[0].texts;

        //get answers
        let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: this.questionId });
        ans.subscribe((response2) => {
          let tempAnswers = response2;
          for (let i = 0; i < tempAnswers.length; i++) {
            this.answers[i] = tempAnswers[i]
            console.log('answer responses: ' + this.answers[i].texts);
            this.answer++;
          }

        });
      });
    });
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
      alert('Minumum count reached');
    } else {
      this.answers[this.answer - 1] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
      this.answer--;
    }
  }
  nextQuestion(object, num) {
    this.tempAnswer = this.answers[num].texts;
    console.log('temp answer ' + this.tempAnswer)
    if (this.answers[num].nextQuestionId != null) {

      console.log('previous:' + this.previousAnswers[this.previousAnswerCount])

      this.questionId = Number(this.answers[num].questionId)
      this.previousAnswers[this.previousAnswerCount] = Number(this.questionId);
      this.previousAnswerCount++;
      console.log(Number(this.questionId))
      this.answer = 0;
      let quest = this.Http.post('http://localhost:3000/get-question', { questionId: Number(this.answers[num].nextQuestionId) });
      quest.subscribe((response1) => {
        console.log('response1: ' + response1[0].texts)
        this.question = response1[0].texts;

        // get answers
        let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: Number(this.answers[num].nextQuestionId) });
        ans.subscribe((response2) => {
          let tempAnswers = response2;
          for (let i = 0; i < tempAnswers.length; i++) {
            this.answers[i] = tempAnswers[i]
            console.log('answer responses: ' + this.answers[i].texts);
            this.answer++;
          }
        });
      });


    }
    else {
      console.log('no next question linked')
      for (let i = 0; i < 9; i++) {
        this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
      }
      
      this.previousAnswerCount++;
      this.answer = 1;
      this.question =" "

    }

  }
  submit() {
    if (this.previousAnswerCount == 0) {


      let update = this.Http.post('http://localhost:3000/update-script', { questionId: this.questionId, question: this.question })
      update.subscribe((result) => {
        console.log(result)
        console.log('THISGOING TO WORK')
        for (let j = 0; j < this.answer; j++) {
          console.log('THIS IS GOING TO WORK: ' + this.answers, this.answers[j].texts)

          let send = this.Http.post<questionData>('http://localhost:3000/editAnswer', { texts: this.answers[j].texts, questionId: this.questionId, nextQuestionId: this.answers[j].nextQuestionId });
          send.subscribe((res) => {
            //console.log('THIS IS WHAT HAS RERTUEND: ' + res.result)
          });

        }

      });

    }
    else{
      console.log('ques:' + this.response )
    this.scriptData1.questionId = this.Auth.scriptData1.questionId;
    this.scriptData1.scriptId = this.Auth.scriptData1.scriptId;
  
        console.log('ques: ' + this.questionId + 'scri' + this.scriptId)
    this.Auth.submitEditAnswer( this.questionId, this.scriptId, this.answers, this.question, this.tempAnswer)
    //this.saved = true;
    }
  }
}

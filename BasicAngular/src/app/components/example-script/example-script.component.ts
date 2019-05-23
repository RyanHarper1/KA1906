import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser'; 

@Component({
  selector: 'app-example-script',
  templateUrl: './example-script.component.html',
  styleUrls: ['./example-script.component.scss']
})
export class ExampleScriptComponent implements OnInit {
  list: any;
  scriptId: any;
  scriptName: any;
  response:any
  category: any;
  questionId: any;
  question: any;
  private answers: any;
  answer = 0;
  selectedAnswer: any;
  constructor(sanitizer: DomSanitizer, iconRegistry: MatIconRegistry, private Http: HttpClient) {

    iconRegistry.addSvgIcon(
      'answer',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron.svg'));
    iconRegistry.addSvgIcon(
      'remove',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/red-cross.svg'));
    iconRegistry.addSvgIcon(
      'record',
     sanitizer.bypassSecurityTrustResourceUrl('../assets/img/microphone-solid.svg'));
    iconRegistry.addSvgIcon(
      'pause',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/pause-solid.svg'));
    iconRegistry.addSvgIcon(
      'stop',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/stop-solid.svg'));
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
    }


  ngOnInit() {
    let query = this.Http.post('http://localhost:3000/get-script', {scriptId: 61});
    query.subscribe((response)=>{
      console.log('response to this is: ' + response)
      this.response=response;
      this.category = response[0].category;
      this.scriptName = response[0].scriptName;
      this.questionId = response[0].firstQuestionId;

  // get question
      let quest = this.Http.post('http://localhost:3000/get-question',{questionId: this.questionId});
      quest.subscribe((response1)=>{
      console.log('response1: ' + response1[0].texts)
      this.question = response1[0].texts;

      // get answers
        let ans = this.Http.post('http://localhost:3000/get-answer', {questionId: this.questionId});
        ans.subscribe((response2) => {
        this.answers = response2;
          for( let i = 0; i < this.answers.length; i++){
            console.log('answer responses: ' + this.answers[i].texts);
            this.answer++;
          }
        });
    });
    });
  }

}

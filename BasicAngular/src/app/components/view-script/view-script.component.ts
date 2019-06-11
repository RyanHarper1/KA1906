import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ViewScriptService } from 'src/app/view-script.service';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';


@Component({
  selector: 'app-view-script',
  templateUrl: './view-script.component.html',
  styleUrls: ['./view-script.component.scss'],
})
export class ViewScriptComponent implements OnInit  {
  list: any;
  scriptId: any;
  scriptName: any;
  response:any;
  category: any;
  questionId: any;
  question: any;
  private answers: any;
  answer = 0;
  selectedAnswer: any;
  previousAnswers: any[] ;
  previousAnswerCount = 0;
  loaded = false;
  title = 'ngx-editor';
  store = false;
  editorConfig = {
    editable: false,
    spellcheck: true,
    background: 'white',
    height: '150px',
    minHeight: '150px',
    translate: 'yes',
    enableToolbar: false,
    showToolbar: false,
    placeholder: 'Enter text here...',

  //   toolbar: [
  //     ["bold", "italic", "underline", "strikeThrough", "superscript", "subscript"],
  //     ["fontName", "fontSize", "color"],
  //     ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull", "indent", "outdent"],
  //     ["cut", "copy", "delete", "removeFormat", "undo", "redo"],
  //     ["paragraph", "blockquote", "removeBlockquote", "horizontalLine", "orderedList", "unorderedList"]
  // ]
  };

  htmlContent = '';
  
  constructor(private view: ViewScriptService, private Http: HttpClient, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) { 
    iconRegistry.addSvgIcon(
      'back',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/back-btn.svg'));
    iconRegistry.addSvgIcon(
      'answer',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron.svg'));
  }
  
  ngOnInit() {
    this.scriptId = this.view.scriptId;
    this.store = this.view.store
  
  this.previousAnswers = []
  let query = this.Http.post('http://localhost:3000/get-script', {scriptId: this.scriptId});
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
        this.loaded = true;
      });
    
  });

  });
 
}
nextQuestion(object,num){
  if( this.answers[num].nextQuestionId != null){
    
    console.log('previous:' + this.previousAnswers[this.previousAnswerCount])
   
    this.questionId =  Number(this.answers[num].questionId)
    this.previousAnswers[this.previousAnswerCount] = Number(this.questionId);
    this.previousAnswerCount++;
    console.log(Number(this.questionId))
      this.answer = 0;
      let quest = this.Http.post('http://localhost:3000/get-question',{questionId: Number(this.answers[num].nextQuestionId)});
      quest.subscribe((response1)=>{
      console.log('response1: ' + response1[0].texts)
      this.question = response1[0].texts;

      // get answers
        let ans = this.Http.post('http://localhost:3000/get-answer', {questionId: Number(this.answers[num].nextQuestionId)});
        ans.subscribe((response2) => {
        this.answers = response2;
          for( let i = 0; i < this.answers.length; i++){
            console.log('answer responses: ' + this.answers[i].texts);
            this.answer++;
          }

        });
    });
   

  }
}
backQuestion(){
  this.answer = 0;
  let quest = this.Http.post('http://localhost:3000/get-question',{questionId: this.previousAnswers[this.previousAnswerCount -1]});
  quest.subscribe((response1)=>{
  console.log('response1: ' + response1[0].texts)
  this.question = response1[0].texts;

  // get answers
    let ans = this.Http.post('http://localhost:3000/get-answer', {questionId: this.previousAnswers[this.previousAnswerCount -1]});
    ans.subscribe((response2) => {
    this.answers = response2;
      for( let i = 0; i < this.answers.length; i++){
        console.log('answer responses: ' + this.answers[i].texts);
        this.answer++;
      }
      this.previousAnswerCount--;

    });
});

}


}
import { Component, OnInit } from '@angular/core';
import { EditServiceService } from 'src/app/edit-service.service';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-edit-script',
  templateUrl: './edit-script.component.html',
  styleUrls: ['./edit-script.component.scss']
})
export class EditScriptComponent implements OnInit {
  scriptId: any;
  scriptName: any;
  response:any
  category: any;
  questionId: any;
  question: any;
  private answers: any;
  answer = 0;
  selectedAnswer: any;
  
  constructor(private editService: EditServiceService, private Http: HttpClient) { }

  ngOnInit() {
    this.scriptId = this.editService.getEditScript();
    this.getScript(this.scriptId);
  }

  getScript(scriptId){
    //get script
  let query = this.Http.post('http://localhost:3000/get-script', {scriptId: scriptId});
  query.subscribe((response)=>{
    console.log('response to this is: ' + response)
    this.response=response;
    this.category = response[0].category;
    this.scriptName = response[0].scriptName;
    this.questionId = response[0].firstQuestionId;


    //get question
    let quest = this.Http.post('http://localhost:3000/get-question',{questionId: this.questionId});
    quest.subscribe((response1)=>{
    console.log('response1: ' + response1[0].texts)
    this.question = response1[0].texts;
    
    //get answers
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

addAnswer(){
  if (this.answer >= 9){
    alert('Maximum count reached');
  }else{
    this.answer++;
  }
  
}
removeAnswer(){
  if (this.answer <= 1){
    alert('Minumum count reached');
  }else{
    this.answers[this.answer-1]= '';
    this.answer--;
  }
}
nextQuestion(){
  //this.selectedAnswer =;
  this.question = ''
  for (let i = 0; i < 9; i++){
    this.answers[i].texts = null;


  }
  this.answer = 0;
  
}
}

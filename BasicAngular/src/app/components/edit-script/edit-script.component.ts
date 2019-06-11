import { Component, OnInit, ViewEncapsulation } from '@angular/core';
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
  styleUrls: ['./edit-script.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class EditScriptComponent implements OnInit {
  scriptId: any;
  scriptName: any;
  response: any
  subcategory: any;
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
  response1: any;
  loadedScript = false;
  tempQuestionId: any;

  title = 'ngx-editor';
  editorConfig = {
    editable: true,
    spellcheck: true,
    background: 'white',
    height: '150px',
    minHeight: '150px',
    translate: 'yes',
    enableToolbar: true,
    showToolbar: true,
    placeholder: 'Enter text here...',
    toolbar: [
      ["bold", "italic", "underline", "strikeThrough", "superscript", "subscript"],
      ["fontName", "fontSize", "color"],
      ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull", "indent", "outdent"],
      ["cut", "copy", "delete", "removeFormat", "undo", "redo"],
      ["paragraph", "blockquote", "removeBlockquote", "horizontalLine", "orderedList", "unorderedList"]
    ]
  };

  htmlContent = '';

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
    iconRegistry.addSvgIcon(
      'save',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/save-regular.svg'));
    iconRegistry.addSvgIcon(
      'back',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/back-btn.svg'));


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
      this.response = response;
      this.category = response[0].category;
      this.subcategory = response[0].subcategory;
      this.scriptName = response[0].scriptName;
      this.questionId = response[0].firstQuestionId;



      //get question
      let quest = this.Http.post('http://localhost:3000/get-question', { questionId: this.questionId });
      quest.subscribe((response1) => {
        this.question = response1[0].texts;
        this.questionId = response1[0].questionId;

        //get answers
        let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: this.questionId });
        ans.subscribe((response2) => {
          let tempAnswers = response2;
          for (let i = 0; i < (<any>tempAnswers).length; i++) {
            this.answers[i] = tempAnswers[i]
            this.answer++;

          }
          this.loadedScript = true;
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
    if (this.answers[num].nextQuestionId != null) {
      this.loadedScript = true;

      this.questionId = Number(this.answers[num].questionId)
      this.previousAnswers[this.previousAnswerCount] = Number(this.questionId);
      this.previousAnswerCount++;
      this.answer = 0;
      let quest = this.Http.post('http://localhost:3000/get-question', { questionId: Number(this.answers[num].nextQuestionId) });
      quest.subscribe((response1) => {
        this.question = response1[0].texts;
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
           this.answer++;
          }
        });
      });


    }
    else {
      this.loadedScript = false;
      this.previousAnswers[this.previousAnswerCount] = Number(this.questionId);
      this.tempQuestionId = this.questionId;
      this.questionId = null;



      this.previousAnswerCount++;
      for (let i = 0; i < 9; i++) {
        this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }

      }


      this.answer = 1;
      this.question = " "

    }

  }
  submit() {


    let updatetime = this.Http.post('http://localhost:3000/updatescripttime', { scriptId: this.scriptId });
    updatetime.subscribe();


    if (this.questionId == null) {
     let request = this.Http.post<questionData>('http://localhost:3000/addQuestion', { texts: this.question, scriptId: this.scriptId });
      request.subscribe((response1) => {
        this.response1 = response1;
        this.scriptData1.questionId = response1.questionId;

        //insert answers
        for (let i = 0; i < this.answers.length; i++) {
          if (this.answers[i].texts != "") {
            let ans = this.Http.post<questionData>('http://localhost:3000/addAnswer', { texts: this.answers[i].texts, questionId: response1.questionId });
            ans.subscribe((response2) => {
              this.response = response1
            
            });
          }
        }
       let update = this.Http.post('http://localhost:3000/updateAnswer', { nextQuestionId: response1.questionId, questionId: this.tempQuestionId, texts: this.tempAnswer });
        update.subscribe((response2) => {
          this.questionId = response1.questionId
          let quest = this.Http.post('http://localhost:3000/get-question', { questionId: this.questionId });
          quest.subscribe((response1) => {
            this.question = response1[0].texts;

            //get answers
            let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: this.questionId });
            ans.subscribe((response2) => {
              let tempAnswers = response2;
              this.answer = 0;
              for (let i = 0; i < (<any>tempAnswers).length; i++) {
                this.answers[i] = tempAnswers[i]
                this.answer++;
              }
              this.loadedScript = true;

            });
          });
        });


      });
    

    } else {
      let update = this.Http.post('http://localhost:3000/update-script', { questionId: this.questionId, question: this.question })
      update.subscribe((result) => {
      for (let j = 0; j < this.answer; j++) {
          if (this.answers[j].texts != "") {
           
            let send = this.Http.post<questionData>('http://localhost:3000/editAnswer', { texts: this.answers[j].texts, questionId: this.questionId, nextQuestionId: this.answers[j].nextQuestionId });
            send.subscribe((res) => {
           });

          }
        }
      });
    }
  }

  backQuestion() {
    this.answer = 0;
    let quest = this.Http.post('http://localhost:3000/get-question', { questionId: this.previousAnswers[this.previousAnswerCount - 1] });
    quest.subscribe((response1) => {
     this.question = response1[0].texts;
      this.questionId = response1[0].questionId;
      let ans = this.Http.post('http://localhost:3000/get-answer', { questionId: this.previousAnswers[this.previousAnswerCount - 1] });
      ans.subscribe((response2) => {
        let tempAnswers = response2;
        for (let i = 0; i < 9; i++) {
          this.answers[i] = { texts: "", questionId: "", nextQuestionId: null, idanswer: "" }
        }
        for (let i = 0; i < (<any>tempAnswers).length; i++) {
          this.answers[i] = tempAnswers[i]
          this.answer++;
        }
        this.previousAnswerCount--;

      });
    });

  }
}
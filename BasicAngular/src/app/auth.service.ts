import { Injectable, Output, EventEmitter, HostListener, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http';
import { BehaviorSubject } from 'rxjs';
import { BuildScriptComponent } from './components/build-script/build-script.component';



interface userData {
  result: string,
  message: string


}

interface scriptData {
  scriptId: any
  questionId: any;

}

interface questionData {
  questionId: any

}

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  any: any;
  response: any;
  response1: any;
  result: any;
  loggedIn = false;
  email = '';
  fName = '';
  lName = '';
  id: String;
  username: String;
  test: any;
  orgId = null;
  blank = "";
  returns: object;
  address: any;
  admin: any;
  scriptData1 = {} as scriptData;
  @Output() change: EventEmitter<boolean> = new EventEmitter();



  constructor(private Http: HttpClient) { }

  //User login function
  login(email, password) {

    return this.Http.post<userData>('http://salesscript.com.au/sql/login', { email: email, password: password })

  }


  sendScript<scriptData>(scriptName, category, subcategory, description, question, answers) {
    //insert script
    let posts = this.Http.post('http://salesscript.com.au/sql/addscript', { usersID: this.id, category: category, scriptName: scriptName, subcategory: subcategory, description: description });
    posts.subscribe((response) => {
      this.response = response;


      let quest = this.Http.post<questionData>('http://salesscript.com.au/sql/addFirstQuestion', { texts: question, scriptId: this.response.scriptId });
      quest.subscribe((response1) => {
        this.returns = {};
        this.response1 = response1;
        this.scriptData1.scriptId = this.response.scriptId;

        this.scriptData1.questionId = response1.questionId;
        //insert answers
        for (let i = 0; i < answers.length; i++) {
          if (answers[i].texts != "") {
            let ans = this.Http.post<questionData>('http://salesscript.com.au/sql/addAnswer', { texts: answers[i].texts, questionId: response1.questionId });
            ans.subscribe((response2) => {
              this.response = response1

            });
          }

        }





        return this.returns;
      });
    });
    return null;
  }

  submitAnswer(questionId, scriptId, answers, question, selectedAnswer) {
    let quest = this.Http.post<questionData>('http://salesscript.com.au/sql/addQuestion', { texts: question, scriptId: scriptId });
    quest.subscribe((response1) => {
      this.response1 = response1;
      this.scriptData1.questionId = response1.questionId;
      //insert answers
      for (let i = 0; i < answers.length; i++) {
        let ans = this.Http.post<questionData>('http://salesscript.com.au/sql/addAnswer', { texts: answers[i], questionId: response1.questionId });
        ans.subscribe((response2) => {
          this.response = response1


        });
      }

      let update = this.Http.post('http://salesscript.com.au/sql/updateAnswer', { nextQuestionId: response1.questionId, questionId: questionId, texts: selectedAnswer });
      update.subscribe((response2) => {

      });
      return response1.questionId;

    });
  }
  submitEditAnswer(questionId, scriptId, answers, question, selectedAnswer) {
    let quest = this.Http.post<questionData>('http://salesscript.com.au/sql/addQuestion', { texts: question, scriptId: scriptId });
    quest.subscribe((response1) => {
      this.response1 = response1;
      this.scriptData1.questionId = response1.questionId;
      //insert answers
      for (let i = 0; i < answers.length; i++) {
        let ans = this.Http.post<questionData>('http://salesscript.com.au/sql/addAnswer', { texts: answers[i].texts, questionId: response1.questionId });
        ans.subscribe((response2) => {
          this.response = response1

        });
      }
      let update = this.Http.post('http://salesscript.com.au/sql/updateAnswer', { nextQuestionId: response1.questionId, questionId: questionId, texts: selectedAnswer });
      update.subscribe((response2) => {

      });
      return response1.questionId;

    });
  }

  //User register function
  register(object) {

    let posts = this.Http.post('http://salesscript.com.au/sql/addusers', object.value);
    posts.subscribe((response) => {
      this.response = response;


    });

  }
  @HostListener('setLoggedIn')
  setLoggedIn(value: boolean) {

    this.loggedIn = value;
    this.change.emit(this.loggedIn)
  }

  get isloggedIn() {

    return this.loggedIn;
  }
  userDetails(object) {
    this.id = object.id;
    this.email = object.email;
    this.fName = object.fName;
    this.lName = object.lName;
    this.address = object.address;
    this.username = String(object.username);
    this.orgId = object.orgId;
    this.admin = object.admin;


  }
  get getUsername() {
    return String(this.username);
  }
  get getId() {
    return this.id;
  }
  //User register function
  registerOrg(object) {

    let posts = this.Http.post('http://salesscript.com.au/sql/addOrg', object.value);
    posts.subscribe((response) => {
      this.response = response;

      console.log(this.response)
    });

  }
  @HostListener('logout')
  logout() {
    this.loggedIn = false;
    this.email = '';
    this.fName = '';
    this.lName = '';
    this.id = '';
    this.username = '';
    this.orgId = null;
    this.admin = null;

  }



}

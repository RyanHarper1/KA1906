import { HttpClient } from '@angular/common/http';
import { EventEmitter, HostListener, Injectable, Output } from '@angular/core';

interface userData {
  result: string,
  message: string


}

interface scriptData {
  scriptId: any

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
  result: any;
  loggedIn = false;
  email = '';
  fName = '';
  lName = '';
  id: String;
  username: String;
  test: any;
  orgId=null;
  blank = "";
  @Output() change: EventEmitter<boolean> = new EventEmitter();



  constructor(private Http: HttpClient) { }

  //User login function
  login(email, password) {

    return this.Http.post<userData>('http://localhost:3000/login', { email: email, password: password })

  }


  sendScript(scriptName, category, subcategory, description, question, answers) {
    //insert script
    let posts = this.Http.post('http://localhost:3000/addscript', {usersID: this.id,category:category,scriptName:scriptName,subcategory:subcategory,description:description});
    posts.subscribe((response) => {
      this.response = response;

      console.log(this.response);
      console.log(this.response.scriptId);
      console.log('Object 1:' + question)
      
      //insert question
      let quest = this.Http.post<questionData>('http://localhost:3000/addQuestion', { texts: question, scriptId: this.response.scriptId });
      quest.subscribe((response1) => {
        console.log('response1: ' + response1)

        //insert answers
        for (let i = 0; i < answers.length; i++) {
          let ans = this.Http.post<questionData>('http://localhost:3000/addAnswer', { texts: answers[i], questionId: response1.questionId });
          ans.subscribe((response2) => {
            this.response = response1
            console.log('answer responses: ' + response2);
            
          });
        }

        return response1.questionId;
      });
    });
  
  }
  
  //User register function
  register(object) {

    let posts = this.Http.post('http://localhost:3000/addusers', object.value);
    posts.subscribe((response) => {
      this.response = response;

      console.log(this.response)
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
    this.username = String(object.username);
    this.orgId = object.orgId;

    console.log(this.username);
  }
  get getUsername() {
    return String(this.username);
  }
  get getId() {
    return this.id;
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
    console.log('blah');
  }

}

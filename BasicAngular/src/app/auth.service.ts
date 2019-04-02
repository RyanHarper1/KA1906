import { Injectable, Output, EventEmitter, HostListener } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http';
import { BehaviorSubject } from 'rxjs';

interface userData {
result: string,
message: string


}

interface scriptData {
scriptId: any

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
  @Output() change: EventEmitter<boolean> = new EventEmitter();



  constructor(private Http: HttpClient) { }

  //User login function
  login(email, password) {

    return this.Http.post<userData>('http://localhost:3000/login', { email: email, password: password })

  }

  sendScript(object){
  let posts = this.Http.post('http://localhost:3000/addscript', object.value);
  posts.subscribe((response)=>{
    this.response=response;

    console.log(this.response)
    console.log(this.response.scriptId)
  });
}
  //User register function
  register(object){

    let posts = this.Http.post('http://localhost:3000/addusers', object.value);
    posts.subscribe((response) => {
      this.response = response;

      console.log(this.response)
    });

  }
  @HostListener('setLoggedIn')
  setLoggedIn(value: boolean){

    this.loggedIn = value;
    this.change.emit(this.loggedIn)
  }

  get isloggedIn(){

    return this.loggedIn;
  }
  userDetails(object){
    this.id = object.id;
    this.email = object.email;
    this.fName = object.fName;
    this.lName = object.lName;
    this.username = String(object.username);

    console.log(this.username);
  }
  get getUsername(){
    return String(this.username);
  }
  get getId(){
    return this.id;
  }
  @HostListener('logout')
  logout(){
    this.loggedIn = false;
    this.email = '';
    this.fName = '';
    this.lName = '';
    this.id= '';
    this.username= '';
    console.log('blah');
  }

  }

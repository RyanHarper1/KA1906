import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http'

interface userData {
result: string,
message: string

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
 // username = '';

  constructor(private Http: HttpClient) { }

  //User login function
  login(email, password) {

    return this.Http.post<userData>('http://localhost:3000/login', { email: email, password: password })    

  }
  //User register function
  register(object){

    let posts = this.Http.post('http://localhost:3000/addusers', object.value);
    posts.subscribe((response) => {
      this.response = response;

      console.log(this.response)
    });

  }
  setLoggedIn(value: boolean){
    this.loggedIn = value;
  }

  get isloggedIn(){
    return this.loggedIn;
  }
  userDetails(object){
    this.email = object.email;
    this.fName = object.fName;
    this.lName = object.lName;
    //this.username = object.username;

    console.log(this.fName);
  }

  }



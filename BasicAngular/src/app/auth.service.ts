import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  any: any;
  response: Object;

  constructor(private Http: HttpClient) { }

  //User login function
  login(username, password) {

    let posts = this.Http.post('http://localhost:3000/login', { username: username, password: password });
    posts.subscribe((response) => {
      this.response = response;
      //AuthService.getUser('test');
      console.log(this.response)
    });

  }

  register(object){

    let posts = this.Http.post('http://localhost:3000/addusers', object.value);
    posts.subscribe((response) => {
      this.response = response;

      console.log(this.response)
    });

  }
  }



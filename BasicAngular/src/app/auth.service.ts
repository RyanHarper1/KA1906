import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule} from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  any: any;

  constructor(private http: HttpClient) { }
  name: any
  getUser(name){
  

    console.log('yeah nah')
   this.any = this.http.get('localhost:3000/test').subscribe()
   console.log(this.any);

  }
}

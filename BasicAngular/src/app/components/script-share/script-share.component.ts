import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { listLazyRoutes } from '@angular/compiler/src/aot/lazy_routes';

@Component({
  selector: 'app-script-share',
  templateUrl: './script-share.component.html',
  styleUrls: ['./script-share.component.scss']
})
export class ScriptShareComponent implements OnInit {
  logged = false;
  orgId = "";
  list: any;
  list2: any;
  constructor(private auth: AuthService, private Http: HttpClient) {
    
   }

  ngOnInit() {
    this.list = {}
    this.list2 =[]
    this.logged = this.auth.loggedIn;
    this.orgId = this.auth.orgId;
    console.log(this.orgId)
    if (this.logged){
      let scripts = this.Http.post('http://localhost:3000/get-orgscripts', {orgId: this.auth.orgId});
      scripts.subscribe((response) => {
        this.list = response;
        for (let i = 0; i < this.list.length;i++){
          console.log(this.list[i].scriptId)
          let get = this.Http.post('http://localhost:3000/get-script', {scriptId: this.list[i].scriptId});
          get.subscribe((response1) => {
            this.list2[i] = response1[0];
            console.log(this.list2[i])
          
        });
      }
      });
  

      
    }

  }

}

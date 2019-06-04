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
  orgId: any;
  list: any;
  list2: any;
  constructor(private auth: AuthService, private Http: HttpClient) { }

  ngOnInit() {
    this.list = {}
    
    this.logged = this.auth.loggedIn;
    this.orgId = this.auth.orgId;
    console.log(this.orgId)
    if (this.logged){
      let scripts = this.Http.post('http://localhost:3000/get-orgscripts', {orgId: this.auth.orgId});
      scripts.subscribe((response) => {
        this.list = response;
        for (let i = 0; i < this.list.length;i++){
          let get = this.Http.post('http://localhost:3000/get-script', {scriptId: this.list[i].scriptId});
          get.subscribe((response1) => {
            this.list2 = response1;
            console.log('test: ' + this.list2[i].scriptName)
          
        });
      }
      });
  

      
    }

  }

}

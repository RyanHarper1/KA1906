import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent implements OnInit {

  constructor(private Auth:AuthService) { }
  loggedIn: Boolean;
  ngOnInit() {
    this.Auth.change.subscribe(loggedIn => {
           this.loggedIn = loggedIn;
      console.log('nav: ' + this.loggedIn)
    });

  }
  logout(){
    this.Auth.logout();
    this.Auth.change.subscribe(loggedIn => {
      this.loggedIn = loggedIn;
 console.log('nav2: ' + this.loggedIn)
  });
  this.loggedIn = false;
  }

}

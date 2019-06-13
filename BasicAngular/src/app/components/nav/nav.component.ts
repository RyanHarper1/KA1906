import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';


@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})

export class NavComponent implements OnInit {

  constructor(public Auth:AuthService,sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) {
    iconRegistry.addSvgIcon(
      'cart',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/cart.svg'));
  }

  loggedIn: Boolean;
  ngOnInit() {
    this.Auth.change.subscribe(loggedIn => {
           this.loggedIn = loggedIn;
   });

  }
  logout(){
    this.Auth.logout();
    this.Auth.change.subscribe(loggedIn => {
      this.loggedIn = loggedIn;
  });
  this.loggedIn = false;
  }

}

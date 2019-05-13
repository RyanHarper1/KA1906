import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';

@Component({
  selector: 'app-script-share',
  templateUrl: './script-share.component.html',
  styleUrls: ['./script-share.component.scss']
})
export class ScriptShareComponent implements OnInit {
  logged = false;
  constructor(private auth: AuthService) { }

  ngOnInit() {
    this.logged = this.auth.loggedIn;
  }

}

import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';

@Component({
  selector: 'app-update-details',
  templateUrl: './update-details.component.html',
  styleUrls: ['./update-details.component.scss']
})

export class UpdateDetailsComponent implements OnInit {
  email:any;

 
  constructor(private Auth:AuthService) { }

  ngOnInit() {
    this.email = this.Auth.email;

  }

}

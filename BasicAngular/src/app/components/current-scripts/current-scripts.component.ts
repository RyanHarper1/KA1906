import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';

@Component({
  selector: 'app-current-scripts',
  templateUrl: './current-scripts.component.html',
  styleUrls: ['./current-scripts.component.scss']
})
export class CurrentScriptsComponent implements OnInit {
  list: any;
  columns = ['scriptName','category'];
  username: String;
  constructor(private Http: HttpClient, private Auth: AuthService) { }

  ngOnInit() {
    let current = this.Http.post('http://localhost:3000/current-scripts', {id: this.Auth.getId});
    current.subscribe((response) => {
     
      this.list=response;
      console.log(response)
    });
  }

}

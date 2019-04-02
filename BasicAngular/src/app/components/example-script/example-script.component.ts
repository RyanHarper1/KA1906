import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-example-script',
  templateUrl: './example-script.component.html',
  styleUrls: ['./example-script.component.scss']
})
export class ExampleScriptComponent implements OnInit {
  list: any;
  constructor(private Http: HttpClient) { }

  ngOnInit() {

    let current = this.Http.get('http://localhost:3000/example-scripts');
    current.subscribe((response) => {
     
      this.list=response;
      console.log(response)
    });
  }

}

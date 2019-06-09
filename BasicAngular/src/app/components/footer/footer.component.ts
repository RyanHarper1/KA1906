import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}




@Component({
selector: 'terms',
templateUrl: 'terms.html',
styleUrls: ['./terms.scss']
})
export class terms {

constructor(public dialogRef: MatDialogRef<terms>,) {

}


}
@Component({
  selector: 'contact',
  templateUrl: 'contact.html',
  styleUrls: ['./terms.scss']
  })
  export class contact {
  
  constructor(public dialogRef: MatDialogRef<terms>,) {
  
  }
  
  
  }

import { Component, OnInit } from '@angular/core';
import { MatDialogRef, MatDialog } from '@angular/material';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {
  }


openTerms() {
  const dialogRef = this.dialog.open(terms, {
    width: '700px'
  });
}

}


@Component({
selector: 'terms',
templateUrl: 'terms.html',
//styleUrls: ['./terms.scss']
})
export class terms {

constructor(public dialogRef: MatDialogRef<terms>,) {

}


}

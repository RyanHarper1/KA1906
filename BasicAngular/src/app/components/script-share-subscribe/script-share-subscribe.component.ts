import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-script-share-subscribe',
  templateUrl: './script-share-subscribe.component.html',
  styleUrls: ['./script-share-subscribe.component.scss']
})


export class ScriptShareSubscribeComponent implements OnInit {
  isLinear = false;
  checked = false;
  firstFormGroup: FormGroup;
  secondFormGroup: FormGroup;
  displayedColumns: string[] = ['itemno', 'itemname', 'amount' ];
  dataSource = ELEMENT_DATA;

  constructor(private _formBuilder: FormBuilder, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) { 
    iconRegistry.addSvgIcon(
      'right',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron-right-solid.svg'));
      iconRegistry.addSvgIcon(
        'left',
        sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron-left-solid.svg'));
  }

  ngOnInit() {
    this.firstFormGroup = this._formBuilder.group({
      firstCtrl: ['', Validators.required]
    });
    this.secondFormGroup = this._formBuilder.group({
      secondCtrl: ['', Validators.required]
    });
  }
  }

  export interface SummarySubscription {
    itemno: number;
    itemname: string;
    amount: number;
  }
  
  const ELEMENT_DATA: SummarySubscription [] = [
    {itemno: 1, itemname: 'Script Share Monthly Subscription - 1-20 Users', amount: 40.00 },
    {itemno: 2, itemname: 'Script Share Quarterly Subscription - 1-20 Users', amount: 160.00 },
    {itemno: 5, itemname: 'Script Share Quarterly Subscription - 20-100 Users', amount: 320.00},
    {itemno: 6, itemname: 'Script Share Yearly Subscription - 20-100 Users', amount: 960 },
    {itemno: 7, itemname: 'Script Share Monthly Subscription - 100+ Users', amount: 160 },
    {itemno: 8, itemname: 'Script Share Quarterly Subscription - 100+ Users', amount: 640 },
    {itemno: 9, itemname: 'Script Share Yearly Subscription - 100+ Users', amount: 1920 },
  ];



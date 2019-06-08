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
  constructor(private _formBuilder: FormBuilder, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) { 
    iconRegistry.addSvgIcon(
      'next',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron.svg'));
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

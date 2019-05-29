import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ViewScriptService {

  scriptId: any;

  constructor(private Http: HttpClient) { }

  setScript(scriptId){
    this.scriptId = scriptId

  }

}

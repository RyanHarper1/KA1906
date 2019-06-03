import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';

@Injectable({
  providedIn: 'root'
})
export class EditServiceService {
  scriptId: any;

  constructor(private Http: HttpClient) { }

  setScript(scriptId){
    this.scriptId = scriptId

  }

  getEditScript(){
    return this.scriptId
  }



}

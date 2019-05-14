import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { HttpClientModule } from '@angular/common/http';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';

@Injectable({
  providedIn: 'root'
})
export class CartService {

  storeID: any;

  constructor(private Http: HttpClient) { }

  setStoreID(storeID){
    this.storeID = storeID;
  }

  getCartItem(){
    return this.storeID
  }

  add(object){}
}

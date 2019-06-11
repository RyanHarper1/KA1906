import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { MatIconRegistry, MatSnackBar } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { CartService } from 'src/app/cart.service';
import { Router } from '@angular/router';
import { ViewScriptService } from 'src/app/view-script.service';
import{ CategoryPipe } from '../../pipes/category.pipe';
import{ MinPricePipe } from '../../pipes/min-price.pipe';
import{ RatingPipe } from '../../pipes/rating.pipe';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.scss'],
  providers: [MinPricePipe, CategoryPipe, RatingPipe]

})
export class StoreComponent implements OnInit {
  constructor(private snackBar: MatSnackBar,private viewService: ViewScriptService,private Http: HttpClient, private Auth : AuthService, private cartService: CartService, private router: Router, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) {
    iconRegistry.addSvgIcon(
      'cart',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/cart.svg'));
      iconRegistry.addSvgIcon(
        'view',
        sanitizer.bypassSecurityTrustResourceUrl('../assets/img/eye-regular.svg'));
        iconRegistry.addSvgIcon(
          'search',
          sanitizer.bypassSecurityTrustResourceUrl('../assets/img/search.svg'));
          iconRegistry.addSvgIcon(
            'clear',
            sanitizer.bypassSecurityTrustResourceUrl('../assets/img/clearfilter.svg'));
  }
  list: any;
  store:Array<any>;
  i=0;
  loggedIn = false;
  columns = [ 'scriptName','category', 'uploadDate', 'category', 'rating' ];
  usersID: any;

  isDesc: boolean = false;
  column: string = 'CategoryName';

  ngOnInit() {
    this.usersID = this.Auth.getId;
    this.loggedIn = this.Auth.loggedIn
    let store = this.Http.get('http://localhost:3000/store');
    store.subscribe((response) => {

      this.list=response;
      console.log(response)
    });
  }

  /*setCart(cart){
    this.cartService.setStoreID(cart.storeId);
    console.log(cart);
  }*/

  addToCart(store){
    let add = this.Http.post('http://localhost:3000/add-item', {storeID: store.storeID, usersID: this.Auth.id, scriptID: store.scriptID, scriptName:store.scriptName, price: store.price,
                  description: store.description, rating: store.rating, uploadDate: store.uploadDate, category: store.category});
    add.subscribe((response) => {

      this.list=response;
      console.log(response)
      let snackBarRef = this.snackBar.open('Added to cart');
    });
    console.log(store);
  }
  viewScript(script){
    this.viewService.setScript(script.scriptID);
    this.viewService.setStore();
    console.log(script);
    this.router.navigate(['view-script']);
  }

}
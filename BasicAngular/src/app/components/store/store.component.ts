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
import{ SubCategoryPipe } from '../../pipes/sub-category.pipe';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.scss'],
  providers: [MinPricePipe, CategoryPipe, RatingPipe,SubCategoryPipe]

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
  subCat:string;
  term:string;
  Cat:string;

  isDesc: boolean = false;
  column: string = 'CategoryName';

  ngOnInit() {
    this.usersID = this.Auth.getId;
    this.loggedIn = this.Auth.loggedIn
    let store = this.Http.get('http://salesscript.com.au/sql/store');
    store.subscribe((response) => {

      this.list=response;
   });
  }



  addToCart(store){
    let add = this.Http.post('http://salesscript.com.au/sql/add-item', {storeID: store.storeID, usersID: this.Auth.id, scriptID: store.scriptID, scriptName:store.scriptName, price: store.price,
                  description: store.description, rating: store.rating, uploadDate: store.uploadDate, category: store.category});
    add.subscribe((response) => {

      this.list=response;
      let snackBarRef = this.snackBar.open('Added to cart');
    });
  }
  viewScript(script){
    this.viewService.setScript(script.scriptID);
    this.viewService.setStore();
   this.router.navigate(['view-script']);
  }

  clearSearch(){
    this.subCat="";
    this.Cat="";
    this.term="";
  }

}

import { Injectable } from '@angular/core';
import { CanActivateChild, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, CanActivate } from '@angular/router';
import { Observable } from 'rxjs';
import { AuthService} from './auth.service'

@Injectable()
export class AuthGuard implements CanActivate{

  constructor(private Auth: AuthService){

  }
  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    //return this.Auth.isLoggedIn;
    return this.Auth.isloggedIn;
  }
  
}

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';

import { CartComponent } from './components/cart/cart.component';
import { BuildScriptComponent } from './components/build-script/build-script.component';
import { CurrentScriptsComponent } from './components/current-scripts/current-scripts.component';
import { ExampleScriptComponent } from './components/example-script/example-script.component';
import { StoreComponent } from './components/store/store.component';
import { AuthService } from './auth.service'
import { AuthGuard } from './auth.guard';
import { ScriptShareComponent} from './components/script-share/script-share.component'

const routes: Routes = [
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'register',
    component: RegisterComponent
  },
  {
    path: 'home',
    component: HomeComponent,

  },
  
  //Only allow access to following components when signed in
  {
    path: 'cart',
    component: CartComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'build-script',
    component: BuildScriptComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'current-script',
    component: CurrentScriptsComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'example-script',
    component: ExampleScriptComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'store',
    component: StoreComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'script-share',
    component: ScriptShareComponent,
    canActivate: [AuthGuard]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

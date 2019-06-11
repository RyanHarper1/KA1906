import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { LoginComponent, privacy } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';

import { CartComponent } from './components/cart/cart.component';
import { BuildScriptComponent, DialogForm } from './components/build-script/build-script.component';
import { CurrentScriptsComponent, uploadForm } from './components/current-scripts/current-scripts.component';
import { ExampleScriptComponent } from './components/example-script/example-script.component';
import { StoreComponent } from './components/store/store.component';
import { AuthService } from './auth.service'
import { AuthGuard } from './auth.guard';
import { ScriptShareComponent} from './components/script-share/script-share.component'
import { EditScriptComponent} from './components/edit-script/edit-script.component'
import {UpdateDetailsComponent} from './components/update-details/update-details.component'
import { AdminComponent } from './components/admin/admin.component';
import { ViewScriptComponent } from './components/view-script/view-script.component';
import { terms, contact } from './components/footer/footer.component';
import { confirm} from './components/cart/cart.component'
import { ScriptShareSubscribeComponent } from './components/script-share-subscribe/script-share-subscribe.component';

const routes: Routes = [
    {
    path: 'login',
    component: LoginComponent
  },
  {
  path: 'confirm',
  component: confirm
},
  {
    path: 'register',
    component: RegisterComponent
  },
  {
    path: 'home',
    component: HomeComponent,
  },
  {
    path: '',
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
  },
  {
    path: 'current-script',
    component: CurrentScriptsComponent,
  },
  {
    path: 'example-script',
    component: ExampleScriptComponent,
  },
  {
    path: 'store',
    component: StoreComponent,
  },
  {
    path: 'script-share',
    component: ScriptShareComponent,
  },
  {
    path: 'edit-script',
    component: EditScriptComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'update-details',
    component: UpdateDetailsComponent,
    canActivate: [AuthGuard]
  },
    {
    path: 'DialogForm',
    component: DialogForm,

  },
  {
    path: 'terms',
    component: terms,

  },
  {
    path: 'contact',
    component: contact,

  },
  {
    path: 'privacy',
    component: privacy,

  },
  {
  path: 'subscribe',
  component: ScriptShareSubscribeComponent,

},
{
  path: 'uploadForm',
  component: uploadForm,

},
  {
  path: 'admin',
  component: AdminComponent,
  canActivate: [AuthGuard]

},
{
  path: 'view-script',
  component: ViewScriptComponent,
  canActivate: [AuthGuard]

}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

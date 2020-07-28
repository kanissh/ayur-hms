import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginPageComponent } from './login-page/login-page.component';
import { PatientRegComponent } from './patient-reg/patient-reg.component';


const routes: Routes = [
  { path: 'pat-reg', component: PatientRegComponent },
  // { path: 'login', component: LoginPageComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

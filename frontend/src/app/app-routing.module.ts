import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
// import { LoginPageComponent } from './login-page/login-page.component';
import { PatientRegComponent } from './patient-reg/patient-reg.component';
import { PatientAddmissionComponent } from './patient-addmission/patient-addmission.component';
import { SearchPageComponent } from './search-page/search-page.component';


const routes: Routes = [
  { path: '', component: PatientRegComponent },
  { path: 'pat-adm', component: PatientAddmissionComponent },
  //{ path: '', component: SearchPageComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

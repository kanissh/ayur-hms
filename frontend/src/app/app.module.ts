import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PatientRegComponent } from './patient-reg/patient-reg.component';
import { ViewRecordsComponent } from './view-records/view-records.component';

@NgModule({
  declarations: [
    AppComponent,
    PatientRegComponent,
    ViewRecordsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

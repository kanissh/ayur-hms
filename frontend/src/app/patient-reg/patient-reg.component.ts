import { Component, NgModule, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { SidenavBarComponent } from '../sidenav-bar/sidenav-bar.component';


@Component({
  selector: 'app-patient-reg',
  templateUrl: './patient-reg.component.html',
  styleUrls: ['./patient-reg.component.css']
})

@NgModule({
  imports: [SidenavBarComponent]
})
export class PatientRegComponent implements OnInit {

  page = {name: 'Patient Registration'};
  hospitalsCd: String[] = ['Anuradhapura', 'Polonnaruwa'];

  constructor(private fb: FormBuilder) { }

  ngOnInit() {
  
  }

}

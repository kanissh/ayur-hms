import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-patient-reg',
  templateUrl: './patient-reg.component.html',
  styleUrls: ['./patient-reg.component.css']
})
export class PatientRegComponent implements OnInit {

  hospitalsCd: String[] = ['Anuradhapura', 'Polonnaruwa'];

  constructor(private fb: FormBuilder) { }

  ngOnInit() {
  
  }

}

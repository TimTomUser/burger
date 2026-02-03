import { Component, Input, signal } from '@angular/core';
import { Serviceapi } from '../../serviceapi';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators} from '@angular/forms';
@Component({
  selector: 'app-contactus',
  imports: [ReactiveFormsModule],
  templateUrl: './contactus.html',
  styleUrl: './contactus.scss',
})
export class Contactus {
@Input() contentContactus: any = [];

formulaire: FormGroup;

constructor (private fb: FormBuilder, private api: Serviceapi, ) {
  this.formulaire = this.fb.group({
    name:  ['', Validators.required ],
    email: ['', Validators.required ],
    message: ['', Validators.required, Validators.minLength(55) ]
  }); 


}
}

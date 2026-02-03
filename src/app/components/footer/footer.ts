import { ChangeDetectorRef, Component, signal } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { Serviceapi } from '../../serviceapi';

@Component({
  selector: 'app-footer',
  imports: [ReactiveFormsModule],
  templateUrl: './footer.html',
  styleUrl: './footer.scss',
})
export class Footer {
  // @Input() contentFooter: any = [];

  formfooter: FormGroup;

  constructor(private fb: FormBuilder, private apiService: Serviceapi,) {
    this.formfooter = this.fb.group({
      email: ['', Validators.required, Validators.email, Validators.minLength(5)],
    });

  }
}
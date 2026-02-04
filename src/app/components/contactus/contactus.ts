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

  // soumettre(): void {
  //   if (this.formulaire.valid) {
  //     const formData = new FormData();
  //     for(const key in this.formulaire.value) {
  //       formData.append(key, this.formulaire.value[key]);
  //     }
  //     document.getElementById('submitform')?.remove();
  //     document.getElementById('loader')?.classList.remove('d-none');

  //     this.monApiService.postFormData(formData).subscribe({
  //       next: (response) => {
  //         document.getElementById("monFormulaire")?.classList.add('d-none');
  //         let maReponse = JSON.parse(response);
  //         if(maReponse.status == "success") {
  //           document.getElementById("confirmation")?.classList.remove('d-none');
  //         } else {
  //           document.getElementById("erreur")?.classList.remove('d-none');
  //         }
  //       },
  //       error: (err) => {
  //         switch(err.status) {
  //           case 401:
  //             console.log('Erreur 401: Unauthorized');
  //             break;
  //           case 403:
  //             console.log('Erreur 403: Forbidden');
  //             break;
  //         }
  //       }
  //     });
  //   }
  // }

}
}

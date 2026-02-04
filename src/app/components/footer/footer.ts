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

  constructor(private fb: FormBuilder, private apiService: Serviceapi, private cdr: ChangeDetectorRef) {
    this.formfooter = this.fb.group({
      email: ['', Validators.required, Validators.email, Validators.minLength(9)],
    });

    // this.apiService.fetchRegions().subscribe({
    //   next: (response) => {
    //     this.listeRegions = JSON.parse(response);
    //     this.cdr.detectChanges();
    //   }
    // });

  }
  //   soumettre(): void {
  //   if (this.formfooter.valid) {
  //     const formData = new FormData();
  //     for(const key in this.formfooter.value) {
  //       formData.append(key, this.formfooter.value[key]);
  //     }
  //     document.getElementById('submitform')?.remove();
  //     document.getElementById('loader')?.classList.remove('d-none');

  //     this.apiService.getJsonData(formData).subscribe({
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

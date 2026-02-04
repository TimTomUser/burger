import { Component, signal, OnInit, inject } from '@angular/core';
// import { RouterOutlet } from '@angular/router';
import { HttpClient } from '@angular/common/http';
// import { Serviceapi } from './serviceapi';
import { Menunav } from './components/menunav/menunav';
import { Header } from './components/header/header';
import { Aboutus } from './components/aboutus/aboutus';
import { Hotdeals } from './components/hotdeals/hotdeals';
import { Menu } from './components/menu/menu';
import { Avis } from './components/avis/avis';
import { Video } from './components/video/video';
import { Contactus } from './components/contactus/contactus';
import { Footer } from './components/footer/footer';
// import 'src/styles.scss';
import { UserData } from './components/header/header.model';

@Component({
  selector: 'app-root',
  imports: [Menunav, Header, Aboutus, Hotdeals, Video, Contactus, Footer],
  templateUrl: './app.html',
  styleUrl: './app.scss'
})
export class App implements OnInit {
  private http = inject(HttpClient);

  // On précise que le Signal va contenir un tableau de UserData
   monHeader = signal<any>(null);

  ngOnInit() {
    this.http.get<any>('http://localhost:8080/index.php').subscribe({
      next: (response) => {
        this.monHeader.set(response);
        console.log(response); // Succès : le signal est mis à jour
      },
      error: (err) => {
        // C'est ici que tu verras l'erreur JSON.parse si ton PHP renvoie du texte/erreur au lieu du JSON
        console.error('Erreur API :', err);
      }
    });
  }
}
// }
//   protected readonly title = signal('burger');
//   // title: string = 'burger';

//   // dataMenunav = signal<any>([]);
  // monHeader = signal<any>([]);
//   dataAboutus = signal<any>([]);
//   dataHotdeals = signal<any>([]);
//   // dataMenu = signal<any>([]);
//   // dataAvis = signal<any>([]);
//   // dataVideo = signal<any>([]);
//   // dataContactus = signal<any>([]);
//   // dataFooter = signal<any>([]);

//   constructor(private http: Serviceapi) {
//     this.http.fetchData().subscribe({
//       next: (response) => {
//         let result = JSON.parse(response);
//         // Assignation des valeurs directement avec la clé du tableau JSON
//         // Plutôt qu'un push pour qu'Angular détecte bien le changement.
//         // this.dataMenunav.set(result.menu);
//         this.dataHeader.set(result.header);
//         this.dataAboutus.set(result.aboutus);
//         this.dataHotdeals.set(result.hotdeals);
//         // this.dataMenu.set(result.menu);
//         // this.dataAvis.set(result.avis);
//         // // this.dataVideo.set(result.menu);
//         // this.dataContactus.set(result.contactus);
//         // this.dataFooter.set(result.footer);

//         // On déclenchait le ChangeDetectorRef à la main pour qu'il relise les données et détecte les changements.
//         // this.cdr.detectChanges();
//       },
//       // Si on a eu une erreur lors de la requête HTTP, on log l'erreur en console
//       error: (err) => {
//         switch (err.status) {
//           case 401:
//             console.log('Erreur 401 : Token manquant');
//             break;
//           case 403:
//             console.log('Erreur 403 : Accès interdit');
//             break;
//         }
//       }
//     });
//   }
// }
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root',
})
export class Serviceapi {
  
  constructor(private http: HttpClient) {}

  fetchData() {
    return this.http.get('http://localhost:8080/index.php', {
      headers: {'Authorization' : 'VBnAzKpOLlf5DZSNpNuXJmvg4' },
      responseType: 'text'
    });
  }

  getJsonData(formData: FormData) {
    return this.http.post('http://localhost:8080/index.php', {
      headers: {'Authorization' : 'VBnAzKpOLlf5DZSNpNuXJmvg4' },
      responseType: 'text'
    });
  }

}

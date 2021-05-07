import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Diary } from './diary';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
  })
};


@Injectable({
  providedIn: 'root'
})
export class ServerService {

  private apiUrl = 'http://localhost:8000/api/diaries';

  constructor(
    private http: HttpClient
  ) { }

  getDiaries(): Promise<Diary[]> {
    return this.http.get<Diary[]>(this.apiUrl).toPromise();
  }

  public addDiary(newDiary: Diary): Promise<Diary> {
    return this.http.post<Diary>(this.apiUrl, newDiary).toPromise();
  }

  public getDiary(id: number): Promise<Diary> {
    return this.http.get<Diary>(`${this.apiUrl}/${id}`).toPromise();
  }

  public updateDiary(id: number, data: Diary): Promise<Diary> {
    return this.http.put<Diary>(`${this.apiUrl}/${id}`, data).toPromise();
  }
}

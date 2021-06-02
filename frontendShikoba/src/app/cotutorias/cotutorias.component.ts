import { stringify } from '@angular/compiler/src/util';
import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { AuthService } from '../auth.service';


@Component({
  selector: 'app-cotutorias',
  templateUrl: './cotutorias.component.html',
  styleUrls: ['./cotutorias.component.css']
})
export class CotutoriasComponent implements OnInit {
  constructor(public api:ApiService, public auth:AuthService) {
  }

  
  viewDate:any = new Date();
  diaEnMiliSegundos:number = 1000 * 60 * 60 * 24;

  mostrarCartas:boolean = false;
  mostrarAlumno:boolean = true;
  
  mostrarInformes:boolean = true;
  fecha:string = "";
  nombre:string = "";
  idAlumno:string = "";

  fechaInicial:Date;
  fechaFinal:Date;
  fechaInicialCadena:string;
  fechaFinalCadena:string;

  alumno:any;

  ngOnInit(): void{
    console.log(this.viewDate);
    console.log(this.viewDate.getDay());
    //Generación de fechaInicial (lunes) y fechaFinal (viernes)
    this.fechaInicial = new Date(this.viewDate.getTime() - this.diaEnMiliSegundos*(this.viewDate.getDay()-1));
    
    this.fechaFinal = new Date(this.fechaInicial.getTime() + this.diaEnMiliSegundos*4);
    
    console.log(this.fechaInicial)
    console.log(this.fechaFinal)
    

    this.api.init();
  }

  logout(){
    this.auth.logout();
  }

  locationIndex(){
    this.auth.locationIndex();
  }

  accedeAlumno(alumno:any){
    this.alumno = alumno;
    this.mostrarCartas = true;
    this.mostrarAlumno = false;
    this.nombre = alumno.nombre+" "+alumno.apellido1+" "+alumno.apellido2;
    this.idAlumno = alumno.id;
    this.actualizarFechasCadena();
    this.buscarFecha(this.fechaInicial);
  }
  
  anadirCero(dia:string){
    if(Number(dia) < 10){
      dia = "0"+ dia;
    }
    return dia;
  }
  
  cambiarDia(n:number){
    this.buscarFecha(new Date(this.fechaInicial.getTime()+ this.diaEnMiliSegundos*n));
  }

  cambiarSemana(n:number){
    this.fechaInicial = new Date(this.fechaInicial.getTime()+(this.diaEnMiliSegundos*7)*n);
    this.fechaFinal = new Date(this.fechaFinal.getTime()+(this.diaEnMiliSegundos*7)*n);
    this.actualizarFechasCadena();
    this.buscarFecha(this.fechaInicial);
    console.log(this.fechaInicial)
  }

  actualizarFechasCadena(){
    this.fechaInicialCadena = this.anadirCero(""+this.fechaInicial.getDate())+"/"+this.anadirCero(""+Number(this.fechaInicial.getMonth()+1))+"/"+this.fechaInicial.getFullYear();
    this.fechaFinalCadena = this.anadirCero(""+this.fechaFinal.getDate())+"/"+this.anadirCero(""+Number(this.fechaFinal.getMonth()+1))+"/"+this.fechaFinal.getFullYear();
  }

  buscarFecha(fecha:Date){
    this.api.getInformesDia(fecha.getFullYear()+"-"+Number(fecha.getMonth()+1)+"-"+fecha.getDate(), this.idAlumno);
    console.log(this.api.informesAlumno)
  }


}
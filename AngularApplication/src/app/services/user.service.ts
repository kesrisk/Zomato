import { Injectable } from '@angular/core';
import { ApiService } from './api.service';


@Injectable()

export class UserService {
    constructor(private api: ApiService){

    }


    register(data) {
        return this.api.post<any>('/register',data, 'resgiter');
    }


    getAddress(){
        return this.api.get<any>('/user/address', 'getAddress');
    }

    createAddress(data: any) {
        return this.api.post<any>('/user/address', data, 'createAddress');
    }
}

package com.eciels.android.INEC.FoodDomain;

import java.io.Serializable;



import android.graphics.Bitmap;

import java.io.Serializable;

    public class VotingTextDomain implements Serializable {
        private String acronymName;
        private String result;
        private String pollingunit;
        private String ward;
        private String party_apc;
        private String party_pdp;
        private String party_others;

        private String party_lp;
        private String party_adc;


        private String result_pdp;
        private String result_apc;
        private String result_lp;
        private String result_adc;
        private String result_others;
        private String party;
        private int numberInCart;



        public VotingTextDomain(String pollingunit, String ward,  String party_pdp,  String party_apc,  String party_others,String result_pdp,String result_apc,String result_others,String result_lp,String party_lp, String acronymName,String result , String party_adc, String result_adc) {


                this.acronymName = acronymName;
            this.result = result;
            this.pollingunit = pollingunit;
            this.ward = ward;

            this.party_pdp = party_pdp.trim();
            this.party_others = party_others.trim();
            this.party_lp= party_lp.trim();
            this.party_apc = party_apc.trim();
            this.party_adc=party_adc;

            this.result_pdp = result_pdp;
            this.result_apc = result_apc;
            this.result_others = result_others;
            this.result_lp = result_lp;
            this.result_adc =result_adc;
        }

        public VotingTextDomain(String pollingunit, String ward,  String party_pdp,  String party_apc,  String party_others,String result_pdp,String result_apc,String result_others,String result_lp,String party_lp, String acronymName,String result , int numberInCart,String party_adc, String result_adc) {
            this.acronymName = acronymName;
            //this.result = result;
            this.pollingunit = pollingunit;
            this.ward = ward;
            this.party = party;

            this.numberInCart = numberInCart;

        }

        public String getAcronymName() {
            return acronymName;
        }

        public void setTitle(String acronymName) {
            this.acronymName = acronymName;
        }

        public String getPollingunit() {
            return pollingunit;
        }

        public void setPollingunit(String prodId) {
            this.pollingunit = pollingunit;
        }

        public String getWard() {
            return ward;
        }

        public void setWard(String businessId) {
            this.ward = ward;
        }




        public String getParty() {
            return party;
        }

        public void setPic(String party) {
            this.party = party;
        }

        public String getParty_pdp() {
            return party_pdp;
        }

        public void setParty_pdp(String party) {
            this.party_pdp = party;
        }

        public String getParty_apc() {
            return party_apc;
        }

        public void setParty_apc(String party) {
            this.party_apc = party;
        }



        public String getParty_others() {
            return party_others.trim();
        }

        public void setParty_others(String party) {
            this.party_others = party;
        }


        public String getParty_lp() {
            return party_lp;
        }

        public void setParty_lp(String party) {
            this.party_lp = party;
        }


        public String getParty_adc() {
            return party_adc;
        }

        public void setParty_adc(String party) {
            this.party_adc = party;
        }



        public String getResult() {
            return result;
        }

        public void setResult(String result) {
            this.result = result;
        }

        public String getResult_pdp() {
            return result_pdp;
        }

        public void setResult_pdp(String result) {
            this.result_pdp = result;
        }




        public String getResult_apc() {
            return result_apc;
        }

        public void setResult_apc(String result) {
            this.result_apc = result;
        }



        public String getResult_others() {
            return result_others;
        }

        public void setResult_others(String result) {
            this.result_others = result;
        }



        public void setResult_lp(String result) {
            this.result_lp = result;
        }
        public String getResult_lp() {
            return result_lp;
        }


        public void setResult_adc(String result) {
            this.result_adc = result;
        }
        public String getResult_adc() {
            return result_adc;
        }



        public int getNumberInCart() {
            return numberInCart;
        }

        public void setNumberInCart(int numberInCart) {
            this.numberInCart = numberInCart;
        }






}

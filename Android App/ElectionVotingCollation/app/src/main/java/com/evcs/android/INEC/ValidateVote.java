package com.eciels.android.INEC;

public class ValidateVote {

    private int valid_vote ;

    private int reject_vote ;

    private int cast_vote ;

    private int reg_vote ;
    private int accre_vote ;

    private boolean valid=true;
    private boolean cast =true;


    private boolean reg =true;
    private boolean accre =true;

    private boolean rejected =true;


    public boolean getVoteCast()
    {
        return cast;
    }

    public boolean getVoteValid()
    {
        return valid;
    }

    public boolean getTotalAccredition()
    {
        return accre;
    }

    public boolean getTotalReg()
    {
        return reg;
    }

    public boolean getTotalRejected()
    {
        return rejected;
    }


    public void setValidateVote(String strReg,String strAccre,String strcast,String strrej, String strvalid)
    {

        valid_vote =Integer.parseInt(strvalid);

        cast_vote =Integer.parseInt(strcast);
        reject_vote =Integer.parseInt(strrej);

        accre_vote=Integer.parseInt(strAccre);

        reg_vote=Integer.parseInt(strReg);

        int total=valid_vote  + reject_vote;

        if(valid_vote > cast_vote)
        {

            valid=false;

        }

        if(total != cast_vote)
        {

            cast=false;

        }

        if(accre_vote > reg_vote)
        {

            reg=false;

        }

        if(cast_vote> accre_vote )
        {

            accre=false;

        }
        if(reject_vote<0){ rejected=false;}


    }
}

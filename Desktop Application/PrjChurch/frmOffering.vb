Imports System.Data.OleDb
Public Class frmOffering

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Call conns()

            Dim dateapp As String

            If TextBox1.Text = "" Then

                MsgBox("Values Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox2.Text = "" Then

                MsgBox("Description Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            '  If TextBox3.Text = "" Then

            'MsgBox("Name Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If

            If TextBox4.Text = "" Then

                MsgBox("Amount in Word can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            strconss.Close()

            Call conns()
            str_sql_user_select = "SELECT  COUNT(*) AS [Account]  FROM  [Acct] "

            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            Dim rowAcct As Integer

            While myAccessReader.Read
                rowAcct = myAccessReader("Account")
            End While

            'If rowAcct = 0 Then
            'MsgBox("There is no Money in the Account", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If

            myAccessReader.Close()
            strconss.Close()


            Call conns()
            str_sql_user_select = "SELECT  mBalance   FROM  [Acct] "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

            'myAccessReader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' Dim rowAcct As Integer
            Dim Balance, Expen As Double
            Expen = CDbl(TextBox1.Text)
            While myAccessReader.Read
                Balance = CDbl(myAccessReader("mBalance"))
            End While

            'If Expen > Balance Then
            'MsgBox("Expenses is Greater than the Account Balance", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If

            myAccessReader.Close()
            strconss.Close()

            Call conns()
            Dim dates As Date
            Dim dYear As String
            Dim dMonth As String
            Dim dMonth1 As String = ""
            dates = CDate(DateTimePicker2.Text)

            dateapp = CStr(dates)
            dYear = CStr(DatePart(DateInterval.Year, dates))
            dMonth = Trim(CStr(DatePart(DateInterval.Month, dates)))

            If dMonth = "1" Then
                dMonth1 = "January"
            End If
            If dMonth = "1" Then
                dMonth1 = "January"
            End If
            If dMonth = "2" Then
                dMonth1 = "February"
            End If
            If dMonth = "3" Then
                dMonth1 = "March"
            End If
            If dMonth = "4" Then
                dMonth1 = "Apriel"
            End If
            If dMonth = "5" Then
                dMonth1 = "May"
            End If
            If dMonth = "6" Then
                dMonth1 = "June"
            End If
            If dMonth = "7" Then
                dMonth1 = "July"
            End If
            If dMonth = "8" Then
                dMonth1 = "August"
            End If
            If dMonth = "9" Then
                dMonth1 = "September"
            End If
            If dMonth = "10" Then
                dMonth1 = "October"
            End If
            If dMonth = "11" Then
                dMonth1 = "November"
            End If
            If dMonth = "12" Then
                dMonth1 = "December"
            End If


            Dim sqlString As String = ""
            sqlString = "INSERT INTO  offering(dpaydate,vYear,vMonth,vName,vdescrib,mAmount) VALUES(" & _
            "'" & dateapp & "'," & _
             "'" & dYear & "'," & _
              "'" & dMonth1 & "'," & _
             "'" & UserN.Trim & "'" & "," & _
              "'" & Me.TextBox2.Text.Trim & "'" & "," & _
             "" & Me.TextBox1.Text.Trim & "" & ")"

            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()

            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            myAccessReader.Close()
            strconss.Close()

            Call conns()
            str_sql_user_select = "SELECT  COUNT(*) AS [Account]  FROM  [Acct] "
            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()
            'Dim rowAcct As Integer

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rowAcct = myAccessReader("Account")
            End While
            myAccessReader.Close()
            strconss.Close()
            Call conns()

            If rowAcct = 0 Then
                sqlString = ""
                sqlString = "INSERT INTO  [Acct]([mBalance],[mSalary],[mIncome],[mTithe],[mPledges],[mOffering], [mOtherExp]) VALUES(" & _
                            "0," & _
                            "0," & _
                            "0," & _
                            "0," & _
                            "0," & _
                            "0," & _
                            "0" & ")"
                'End Select
                ' comUserSelect = New SqlClient.SqlCommand(sqlString, mycon)

                'comUserSelect.ExecuteNonQuery()
                comUserSelectS = New OleDbCommand(sqlString, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



            End If
            myAccessReader.Close()
            strconss.Close()




            Call conns()
            sqlString = ""
            ' Dim sqlStrings As String
            sqlString = "UPDATE  [acct] SET " & _
              "[mOffering] = [mOffering] + " & Me.TextBox1.Text & " "

            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()




            sqlString = ""
            ' Dim sqlStrings As String
            sqlString = "UPDATE  [acct] SET " & _
              "[mBalance] = [mBalance] + " & Me.TextBox1.Text & " "

            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            myAccessReader.Close()
            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Infomation")
            butEdit.Enabled = False
            'TextBox1.Text = ""
            'TextBox2.Text = ""
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try



    End Sub


    Private moni As String
    Private Sub Cur()
        On Error Resume Next
        Call conns()
        str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Currency1]"
        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
        ' myreader = comUserSelect.ExecuteReader()

        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
        myAccessReader = comUserSelectS.ExecuteReader()

        Dim rows As Integer
        While myAccessReader.Read
            rows = myreader("RecordCount")
        End While
        myAccessReader.Close()
        strconss.Close()

        On Error Resume Next
        If rows <> 0 Then
            conns()


            str_sql_user_select = "SELECT * FROM  Currency1 "

            ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' myAccessReader = comUserSelect.ExecuteReader()
            Dim ro As Integer = 0
            While myAccessReader.Read()


                moni = Trim(myAccessReader("vSC_Name")) & ""

                ro += 1

            End While
            strconss.Close()

        End If
        On Error Resume Next
    End Sub

    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer

    '############3 DRAWING IMAGE


    Private P, V As New Pen(Color.Black, 2)
    Private B, C As New Pen(Color.Black, 1)

    Private G, L As Graphics

    Private sBrush As SolidBrush
    Private M As SolidBrush
    Private R1, R3, R4, R5, R6, R7, R8 As Rectangle


    '############333 END OF DRAWING IMAGE


    Public Sub PrintBIll()
        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Offering Payment Details", 800, 1000)
            .Margins.Top = 15
            .Margins.Bottom = 20
            .PaperSize = Ps
        End With

        fntMoney = New Font("Courier New", 13, FontStyle.Bold)
        headfont = New Font("Courier New", 16, FontStyle.Bold)
        tablefont = New Font("Times New Roman", 8, FontStyle.Bold)
        titlefont = New Font("Times New Roman", 8)
        X1 = PrintDocument1.DefaultPageSettings.Margins.Left
        'X1 = X1 + 10
        Dim pageWidth As Integer

        With PrintDocument1.DefaultPageSettings
            pageWidth = .PaperSize.Width - .Margins.Left - .Margins.Right
        End With

        X2 = X1 + 120
        X3 = X2 + pageWidth * 0.5
        W1 = X2 - X1
        W2 = X3 - X2
        W3 = pageWidth - X3
        If printNo = 0 Then
            PrintPreviewDialog1.Document = PrintDocument1
            PrintPreviewDialog1.ShowDialog()
        End If
        If printNo = 1 Then
            PrintDocument1.PrintController = New Printing.StandardPrintController
            PrintDocument1.Print()
        End If




    End Sub
    Private fntMoney As New Font("Arial", 13)
    Private YM As Integer
    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String
    Private fntBold As New Font("Arial", 9)
    Private ypos As Integer
    Private xpos As Integer



    Private Yc As Integer
    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer
    Private intst As Integer
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        ' Private Y As Integer
        ' Dim X1 As Integer
        'Dim X2 As Integer
        'Dim W2 As Integer
        ' Dim str As String
        ' Private Yc As Integer
        Try
            Dim ro As Integer
            Dim lines, Cols As Integer
            Dim dates As Date


            str = ""
            Yc = 0
            lines = 0
            Cols = 0
            dates = CDate(DateTimePicker2.Text)
            Dim datenow As String
            datenow = CStr(dates)
            Dim rowsOrder As Integer = 0

            Dim dts1 As Integer
            Call conns()
            str_sql_user_select = "select max(id )AS  [Studentid] from Offering  "
            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                dts1 = CInt(myAccessReader("Studentid"))
            End While
            strconss.Close()
            myAccessReader.Close()

            '  sqlString = "INSERT INTO  [OtherExp]([dpaydate],[vdescrib],[mvalues]) VALUES(" & _

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Offering  where  vName= '" & UserN & "'  and  id =" & dts1 & "  "
            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            'Dim rows As Integer
            While myAccessReader.Read
                rowsOrder = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            array_STId1 = rowsOrder
            array_STId1 -= 1
            strconss.Close()

            If rowsOrder = 0 Then
                MsgBox("Data Not Available ", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            Dim array_STId2(array_STId1) As String
            Dim array(array_STId1) As String
            Dim stid As String = ""


            If numbs_pay = 0 Then
                Call conns()


                Me.ListItems.Items.Clear()
                str_sql_user_select = "SELECT *  FROM Offering WHERE vName ='" & UserN.Trim & "'  and    id =" & dts1 & "  "

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ro = 0
                While rowsOrder <> ro

                    While myAccessReader.Read()
                        stid = myAccessReader("vName")

                        array_STId2(nos) = stid

                        ' Me.ListItems.Items.Add(myreader(Trim("vStudentid") & ""))
                        Me.ListItems.Items.Add(myAccessReader(Trim("id") & ""))

                        nos += 1
                        ro += 1
                    End While

                End While

                strconss.Close()

            End If


            Call Cur()

            ' ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            'e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)


            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 110, Y + 40)

            If TextBox1.Text <> "" And TextBox2.Text <> "" Then
                e.Graphics.DrawString("OFFERING PAYMENT DETAILS.", headfont, Brushes.Black, X1 + 70, Y + 70)

                'e.Graphics.DrawString("Recipt No:", titlefont, Brushes.Black, X1 + 480, Y + 70)

                ' e.Graphics.DrawString("EMPLOYEE MONTHLY SALARY  DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 90, _
                    .PaperSize.Width - .Margins.Right, Y + 90)
                End With



                For Each i As String In Me.ListItems.Items(itm).ToString

                    intst = Me.ListItems.Items(itm).ToString


                    Call conns()

                    str_sql_user_select = "SELECT *  FROM Offering  where  vName ='" & UserN.Trim & "'  and    id =" & dts1 & " "

                    ' str_sql_user_select = "  SELECT *  FROM payfees where  id= " & intst & " and vSemester ='" & txtSem.Text & "' and vSection = '" & txtSec.Text & "' and  dpayDate ='" & dates & "' "

                    'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()


                    While myAccessReader.Read

                        ' e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)

                        'If ro <> 0 Then
                        'X1 += 100
                        'Y += 25
                        'End If

                        numbs_pay += 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 110)


                        e.Graphics.DrawString("NAME: ", tablefont, Brushes.Black, X1 + 15, Y + 110)
                        e.Graphics.DrawString(myAccessReader("VNAME"), titlefont, Brushes.Black, X1 + 130, Y + 110)


                        'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                        'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                        e.Graphics.DrawString("DATE : ", tablefont, Brushes.Black, X1 + 15, Y + 180)
                        e.Graphics.DrawString(myAccessReader("dpaydate"), titlefont, Brushes.Black, X1 + 130, Y + 180)





                        e.Graphics.DrawString("OFFERING : ", tablefont, Brushes.Black, X1 + 280, Y + 110)
                        e.Graphics.DrawString(Format(Val(myAccessReader("mAmount"))), titlefont, Brushes.Black, X1 + 480, Y + 110)

                        If Trim(moni) & "" = "Cedis" Then
                            e.Graphics.DrawString("C", fntMoney, Brushes.Black, CInt(X1) + 460, CInt(YM) + 131)
                        End If
                        If Trim(moni) & "" = "Naira" Then
                            e.Graphics.DrawString("N", fntMoney, Brushes.Black, CInt(X1) + 460, CInt(YM) + 131)
                        End If
                        e.Graphics.DrawString("PAYMENT DESCRIPTION : ", tablefont, Brushes.Black, X1 + 240, Y + 180)
                        e.Graphics.DrawString(myAccessReader("vdescrib"), titlefont, Brushes.Black, CInt(X1) + 440, CInt(Y) + 180)

                        If TextBox4.Text <> "" Then
                            e.Graphics.DrawString("AMOUNT IN WORD : ", tablefont, Brushes.Black, X1 + 15, Y + 250)
                            e.Graphics.DrawString(Me.TextBox4.Text, titlefont, Brushes.Black, X1 + 135, Y + 250)


                        End If



                        e.Graphics.DrawString("G.O.   SIGNATURE : ................................ ", tablefont, Brushes.Black, X1, Y + 390)

                        e.Graphics.DrawString("ACCOUNTANT   SIGNATURE : ............................... ", tablefont, Brushes.Black, X1 + 350, Y + 390)

                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 30

                        ro += 1

                        count_pay += 1
                        ctr_pay += 1
                        itm += 1


                        '@@@@@@@@@@@@@@@@@@  Start drawing here


                        R4 = New Rectangle(200, 350, 400, 25)
                        R5 = New Rectangle(200, 400, 400, 25)
                        R6 = New Rectangle(90, 300, 600, 190)

                        R7 = New Rectangle(50, 70, 700, 700)

                        Dim J As Pen = New Pen(Color.Black, 4)
                        ' Dim I As Pen = New Pen(Color.Black, 3)

                        Dim Z As Pen = New Pen(Color.Black, 1)

                        R8 = New Rectangle(70, 60, 650, 420)


                        'e.Graphics.DrawRectangle(Pens.Black, R4)
                        'e.Graphics.DrawRectangle(Pens.Black, R5)
                        'e.Graphics.DrawRectangle(Pens.Black, R6)
                        ' e.Graphics.DrawRectangle(Pens.Black, R7)

                        e.Graphics.DrawRectangle(J, 50, 45, 700, 450)
                        ' e.Graphics.DrawRectangle(I, 90, 300, 600, 190)


                        e.Graphics.DrawRectangle(Pens.Black, R8)




                        If Trim(moni) & "" = "Cedis" Then
                            '###### Cedis Currency

                            e.Graphics.DrawLine(P, 568, 132, 568, 150)
                            ' ######### end of Cedis Currency
                        End If
                        If Trim(moni) & "" = "Naira" Then
                            '###### Naira Currency
                            e.Graphics.DrawLine(B, 575, 140, 558, 140)


                            e.Graphics.DrawLine(C, 575, 142, 558, 142)
                            '###### End Naira Currency
                        End If

                        '###### end drawing here


                        If itm = rowsOrder Then
                            itm = 0
                            counts_pay = 0
                            count_pay = 0
                            numbs_pay = 0
                            ctr_pay = 0
                            nos = 0
                            e.HasMorePages = False
                            Exit For
                        End If

                        If count_pay >= 1 Then
                            e.HasMorePages = True
                            counts_pay += count_pay

                            count_pay = 0
                            Exit Sub
                        Else
                            e.HasMorePages = False

                        End If
                        If count_pay = 0 Then
                            e.HasMorePages = False
                        End If



                    End While


                Next
                If count_pay <> 1 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If


                myAccessReader.Close()
                strconss.Close()
            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private printNo As Integer
    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        printNo = 0


        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        PrintBIll()
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click

        If TextBox1.Text = "" Then

            MsgBox("Values Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If
        If TextBox2.Text = "" Then

            MsgBox("Description Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If
        printNo = 1
        Dim choices As String
        choices = MsgBox("Are you sure you want to Print?", vbYesNo + vbInformation, "Print")
        If choices = vbYes Then


            PrintBIll()
        End If
    End Sub

    Private Sub frmOffering_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 616
        Me.Height = 211
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        TextBox1.Text = ""
        TextBox2.Text = ""
        TextBox3.Text = ""
        butEdit.Enabled = True
    End Sub

    Private Sub butexit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butexit.Click
        Me.Close()
    End Sub
End Class
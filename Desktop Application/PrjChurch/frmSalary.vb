Imports System.Data.OleDb
Public Class frmSalary

    Private Sub frmSalary_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 652
        Me.Height = 355
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmSalary_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub





    Private Sub frmSalary_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 652
        Me.Height = 355
        Me.MdiParent = mdiChurch

        CheckBox1.Checked = True

        Me.TextBox4.Text = ""
        Me.TextBox16.Text = ""
        Me.TextBox1.Text = ""
        Me.TextBox12.Text = ""
        Me.TextBox11.Text = ""
        Me.TextBox3.Text = ""

        Me.TextBox6.Text = ""
        Me.txtpos.Text = ""
        Me.TextBox2.Text = ""
        Me.ComboBox1.Text = ""
        Me.ComboBox2.Text = ""
        Me.RadioButton2.Checked = False
        Me.RadioButton1.Checked = False
    End Sub
    Private _empsal As String
    Public Property Empsal() As String
        Get
            Return _empsal

        End Get
        Set(ByVal value As String)
            _empsal = value


            TextBox16.Text = _empsal
            'txtSurname.Text = _StName
            'txtFName.Text = _StName
            Try
                Call conns()
                Dim Gen As String
                Dim Gen1 As String
                Dim Gen2 As String
                Gen1 = "Male"
                Gen2 = "Female"
                Gen = ""
                str_sql_user_select = "SELECT * FROM Employee where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    TextBox1.Text = myAccessReader("vSurname")
                    TextBox12.Text = myAccessReader("vFName")
                    TextBox11.Text = myAccessReader("vMidName")
                    txtpos.Text = myAccessReader("vPosCode")
                    TextBox4.Text = myAccessReader("vDepartStaffCode")
                    Gen = myAccessReader("vGender")
                    'TextBox2.Text = myAccessReader("vTeachingStaff")

                    ro += 1

                End While

                If Trim(Gen) & "" = Trim(Gen1) & "" Then
                    RadioButton1.Checked = True
                    RadioButton2.Checked = False
                End If
                If Trim(Gen) & "" = Trim(Gen2) & "" Then
                    RadioButton2.Checked = True
                    RadioButton1.Checked = False
                End If
                strconss.Close()
                myAccessReader.Close()

                Call conns()

                str_sql_user_select = "SELECT * FROM Positions where vPosCode= '" & Trim(txtpos.Text) & "" & "'"
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                While myAccessReader.Read()

                    TextBox6.Text = Format(Val(myAccessReader("mSalary")))
                    TextBox3.Text = myAccessReader("vPosition")
                    ro += 1

                End While


                strconss.Close()
                myAccessReader.Close()
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property
    Public Sub stAddSAl()
        Call conns()
        str_sql_user_select = "SELECT * FROM Salary"
    End Sub
    Private datemonth, dtm, dt As String
    Private rowctrno, rowctrno1 As Integer
    Dim cdat, dates As Date
    Private Sub getmonth()
        On Error Resume Next
        Dim rows As Integer

        dates = CDate(DateTimePicker1.Text)
        dt = DatePart(DateInterval.Year, dates)
        rowctrno1 = CInt(dt)
        dtm = DatePart(DateInterval.Month, dates)
        If dtm = "1" Then
            dtm = "January"
        End If
        If dtm = "2" Then
            dtm = "February"
        End If
        If dtm = "3" Then
            dtm = "March"
        End If
        If dtm = "4" Then
            dtm = "April"
        End If
        If dtm = "5" Then
            dtm = "May"
        End If
        If dtm = "6" Then
            dtm = "June"
        End If
        If dtm = "7" Then
            dtm = "July"
        End If
        If dtm = "8" Then
            dtm = "August"
        End If
        If dtm = "9" Then
            dtm = "September"
        End If
        If dtm = "10" Then
            dtm = "October"
        End If
        If dtm = "11" Then
            dtm = "November"
        End If
        If dtm = "12" Then
            dtm = "December"
        End If
        Dim rownow As Integer = 0
        Call conns()
        ' cdat = DateTimePicker1.Value
        ' datemonth = cdat.Month

        'str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [salary]"
        str_sql_user_select = "SELECT COUNT(vFName) AS [RecordCount] FROM Salary "

        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
        myAccessReader = comUserSelectS.ExecuteReader()
        'Dim rows As Integer
        While myAccessReader.Read
            rownow = myAccessReader("RecordCount")

        End While
        myAccessReader.Close()
        strconss.Close()

        If rownow <> 0 Then



            Call conns()
            ' cdat = DateTimePicker1.Value
            ' datemonth = cdat.Month

            'str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [salary]"
            str_sql_user_select = "SELECT COUNT(vFname) AS [RecordCount] FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "' and vMonth='" & dtm & "' and vYear='" & rowctrno1 & "'"

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            'Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowctrno = rows
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows > 0 Then
                MsgBox("This Employee has been paid for this Month", MsgBoxStyle.Information, "Information")
            End If
        End If
        On Error Resume Next
    End Sub
    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try



            Dim dateapp As String

            Dim dates As Date
            Dim dYear As String
            Dim dMonth As String
            Dim dMonth1 As String = ""
            dates = CDate(DateTimePicker1.Text)

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


            If TextBox16.Text = "" Then

                MsgBox("Employee Id Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If TextBox1.Text = "" Then

                MsgBox("Surname Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox12.Text = "" Then

                MsgBox("First Name Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If RadioButton2.Checked = False And RadioButton1.Checked = False Then

                MsgBox("Please Select Gender", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            ' If TextBox11.Text = "" Then

            'MsgBox("Middle Name Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If

            If txtpos.Text = "" Then

                MsgBox("Position Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If TextBox5.Text = "" Then

                MsgBox("Amount in Word can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox6.Text = "" Then

                MsgBox("Salary Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If ComboBox1.Text = "" Then

                MsgBox("Mode of Payment Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If ComboBox2.Text = "" Then

                MsgBox("Payment Status Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox4.Text = "" Then

                MsgBox("Department Code Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            'If TextBox2.Text = "" Then

            'MsgBox("Employee Status Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If
            Call getmonth()
            Dim Choices As String
            If rowctrno > 0 Then

                Choices = MsgBox("Are you Sure, you want to Continue ?", vbYesNo + vbInformation, "Salary")
                If Choices = vbYes Then



                    Call conns()
                    str_sql_user_select = "SELECT  COUNT(*) AS [Account]  FROM  [Acct] "
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    Dim rowAcct As Integer

                    While myAccessReader.Read
                        rowAcct = myAccessReader("Account")
                    End While

                    If rowAcct = 0 Then
                        MsgBox("There is no Money in the Account", MsgBoxStyle.Information, "Information")
                        Exit Sub
                    End If

                    myAccessReader.Close()
                    strconss.Close()


                    Call conns()
                    str_sql_user_select = "SELECT  mBalance   FROM  [Acct] "
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    ' Dim rowAcct As Integer
                    Dim Balance, Expen As Double
                    Expen = CDbl(TextBox6.Text)
                    While myAccessReader.Read
                        Balance = CDbl(myAccessReader("mBalance"))
                    End While

                    If Expen > Balance Then
                        MsgBox("Salary is Greater than the Account Balance", MsgBoxStyle.Information, "Information")
                        Exit Sub
                    End If

                    myAccessReader.Close()
                    strconss.Close()


                    Call conns()

                    Call stAddSAl()


                    Dim gender
                    gender = "Male"
                    If RadioButton2.Checked = True Then
                        gender = "Female"
                    End If

                    If RadioButton1.Checked = True Then
                        gender = "Male"
                    End If

                    Dim dateapps As String


                    dateapps = CStr(DateTimePicker1.Value)
                    Dim sqlString As String = ""
                    sqlString = "INSERT INTO  [Salary]([dSalDate],vYear,vMonth,vUser,[vDepartStaffCode],[vEmpid], [vSurname], [vFName], [vMidName],[mSalary],[vPosition],[vStatus],[vmodofpay],[vpayStatus],[vGender]) VALUES(" & _
                    "'" & dateapps & "'," & _
                    "'" & dYear & "'," & _
                    "'" & dMonth1 & "'," & _
                      "'" & UserN & "'," & _
                    "'" & Me.TextBox4.Text.Trim & "'" & "," & _
                     "'" & Me.TextBox16.Text.Trim & "'" & "," & _
                     "'" & Me.TextBox1.Text.Trim & "'" & "," & _
                    "'" & Me.TextBox12.Text.Trim & "'" & "," & _
                     "'" & Me.TextBox11.Text.Trim & "'" & "," & _
                       "" & Me.TextBox6.Text.Trim & "" & "," & _
                     "'" & Me.txtpos.Text.Trim & "'" & "," & _
                     "'" & Me.TextBox2.Text.Trim & "'" & "," & _
                      "'" & Me.ComboBox1.Text.Trim & "'" & "," & _
                         "'" & Me.ComboBox2.Text.Trim & "'" & "," & _
                       "'" & gender & " '" & ")"

                    comUserSelectS = New OleDbCommand(sqlString, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    mycon.Close()
                    MsgBox("Data has been Saved", MsgBoxStyle.Information, "Information")
                    Call conns()
                    str_sql_user_select = "SELECT  COUNT(*) AS [Account]  FROM  [Acct] "
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()


                    ' Dim rowAcct As Integer

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
                        comUserSelectS = New OleDbCommand(sqlString, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                    End If
                    strconss.Close()


                    Call conns()
                    Dim sqlStrings As String
                    sqlStrings = "UPDATE  [Acct] SET " & _
                      "[mSalary] = [mSalary] + " & Me.TextBox6.Text & ""

                    comUserSelectS = New OleDbCommand(sqlString, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    sqlString = ""
                    sqlString = "UPDATE  [Acct] SET " & _
                      "[mBalance] = [mBalance] - " & Me.TextBox6.Text & ""


                    comUserSelectS = New OleDbCommand(sqlString, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    If CheckBox1.Checked <> True Then
                        Me.TextBox4.Text = ""
                        Me.TextBox16.Text = ""
                        Me.TextBox1.Text = ""
                        Me.TextBox12.Text = ""
                        Me.TextBox11.Text = ""
                        Me.TextBox3.Text = ""

                        Me.TextBox6.Text = ""
                        Me.txtpos.Text = ""
                        Me.TextBox2.Text = ""
                        Me.ComboBox1.Text = ""
                        Me.ComboBox2.Text = ""
                        Me.RadioButton2.Checked = False
                        Me.RadioButton1.Checked = False
                        btngo.Enabled = True
                    End If
                    btngo.Enabled = False



                End If
            End If
            If rowctrno = 0 Then




                Call conns()
                str_sql_user_select = "SELECT  COUNT(*) AS [Account]  FROM  [Acct] "
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                Dim rowAcct As Integer

                While myAccessReader.Read
                    rowAcct = myAccessReader("Account")
                End While

                If rowAcct = 0 Then
                    MsgBox("There is no Money in the Account", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                myAccessReader.Close()
                strconss.Close()


                Call conns()
                str_sql_user_select = "SELECT  mBalance   FROM  [Acct] "
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                ' Dim rowAcct As Integer
                Dim Balance, Expen As Double
                Expen = CDbl(TextBox6.Text)
                While myAccessReader.Read
                    Balance = CDbl(myAccessReader("mBalance"))
                End While

                If Expen > Balance Then
                    MsgBox("Salary is Greater than the Account Balance", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                myAccessReader.Close()
                strconss.Close()


                Call conns()

                Call stAddSAl()


                Dim gender
                gender = "Male"
                If RadioButton2.Checked = True Then
                    gender = "Female"
                End If

                If RadioButton1.Checked = True Then
                    gender = "Male"
                End If

                Dim dateapps As String = ""


                dateapps = CStr(DateTimePicker1.Value)
                Dim sqlString As String = ""
                sqlString = "INSERT INTO  [Salary]([dSalDate],vYear,vMonth,[vDepartStaffCode],[vEmpid], [vSurname], [vFName], [vMidName],[mSalary],[vPosition],[vStatus],[vmodofpay],[vpayStatus],[vGender]) VALUES(" & _
                "'" & dateapps & "'," & _
                "'" & dYear & "'," & _
                "'" & dMonth1 & "'," & _
                "'" & Me.TextBox4.Text.Trim & "'" & "," & _
                 "'" & Me.TextBox16.Text.Trim & "'" & "," & _
                 "'" & Me.TextBox1.Text.Trim & "'" & "," & _
                "'" & Me.TextBox12.Text.Trim & "'" & "," & _
                 "'" & Me.TextBox11.Text.Trim & "'" & "," & _
                   "" & Me.TextBox6.Text.Trim & "" & "," & _
                 "'" & Me.txtpos.Text.Trim & "'" & "," & _
                 "'" & Me.TextBox2.Text.Trim & "'" & "," & _
                  "'" & Me.ComboBox1.Text.Trim & "'" & "," & _
                     "'" & Me.ComboBox2.Text.Trim & "'" & "," & _
                   "'" & gender & " '" & ")"

                comUserSelectS = New OleDbCommand(sqlString, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                strconss.Close()
                MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")
                Call conns()
                str_sql_user_select = "SELECT  COUNT(*) AS [Account]  FROM  [Acct] "
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                ' Dim rowAcct As Integer

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
                    comUserSelectS = New OleDbCommand(sqlString, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()



                End If
                strconss.Close()


                Call conns()
                Dim sqlStrings As String
                sqlStrings = "UPDATE  [Acct] SET " & _
                  "[mSalary] = [mSalary] + " & Me.TextBox6.Text & ""

                comUserSelectS = New OleDbCommand(sqlStrings, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                sqlString = ""
                sqlString = "UPDATE  [Acct] SET " & _
                  "[mBalance] = [mBalance] - " & Me.TextBox6.Text & ""


                comUserSelectS = New OleDbCommand(sqlString, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                If CheckBox1.Checked <> True Then
                    Me.TextBox4.Text = ""
                    Me.TextBox16.Text = ""
                    Me.TextBox1.Text = ""
                    Me.TextBox12.Text = ""
                    Me.TextBox11.Text = ""
                    Me.TextBox3.Text = ""

                    Me.TextBox6.Text = ""
                    Me.txtpos.Text = ""
                    Me.TextBox2.Text = ""
                    Me.ComboBox1.Text = ""
                    Me.ComboBox2.Text = ""
                    Me.RadioButton2.Checked = False
                    Me.RadioButton1.Checked = False
                    btngo.Enabled = True
                End If
                btngo.Enabled = False



            End If
            strconss.Close()

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox16_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox16.DoubleClick
        frmEmpsalpuup.MdiParent = mdiChurch
        frmEmpsalpuup.Show()
        frmEmpsalpuup.BringToFront()
        frmEmpsalpuup.WindowState = FormWindowState.Normal

    End Sub

    Private Sub TextBox16_RightToLeftChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox16.RightToLeftChanged

    End Sub

    Private Sub TextBox16_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox16.TextChanged

    End Sub

    Private Sub butExit_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        Me.TextBox4.Text = ""
        Me.TextBox16.Text = ""
        Me.TextBox1.Text = ""
        Me.TextBox12.Text = ""
        Me.TextBox11.Text = ""
        Me.TextBox3.Text = ""

        Me.TextBox6.Text = ""
        Me.txtpos.Text = ""
        Me.TextBox2.Text = ""
        Me.ComboBox1.Text = ""
        Me.ComboBox2.Text = ""
        Me.RadioButton2.Checked = False
        Me.RadioButton1.Checked = False
        btngo.Enabled = True
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub

    Private Sub txtpos_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtpos.TextChanged

    End Sub

    Private moni As String
    Private Sub Cur()
        On Error Resume Next
        Call conns()
        str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Currency1]"
        comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
        myAccessReader = comUserSelectS.ExecuteReader()
        Dim rows As Integer
        While myAccessReader.Read
            rows = myAccessReader("RecordCount")
        End While
        myAccessReader.Close()
        strconss.Close()

        On Error Resume Next
        If rows <> 0 Then
            conns()

            str_sql_user_select = "SELECT * FROM  Currency1 "

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
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

    Private P, V As New Pen(Color.Black, 2)
    Private B, C As New Pen(Color.Black, 1)
    Private G, L As Graphics

    Private sBrush As SolidBrush
    Private M As SolidBrush
    Private R1, R3, R4, R5, R6, R7, R8 As Rectangle
    Public Sub PrintBIll()
        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Outstanding Fees Details", 800, 1000)
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
    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer

    Private YM As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String

    Private fntMoney As New Font("Arial", 13)
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



    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage


        Dim dates As Date
        Dim dt As Integer = 0
        Dim dtm As String = ""
        Try
            Dim ro As Integer
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            'ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10

            Dim rowsOrder As Integer = 0



            Dim StudentId As String

            str = ""
            Yc = 0
            lines = 0
            Cols = 0
            Dim dts As String = ""
            dates = CDate(DateTimePicker1.Text)
            dt = DatePart(DateInterval.Year, dates)
            dts = CStr(dt)
            dtm = DatePart(DateInterval.Month, dates)
            If dtm = "1" Then
                dtm = "January"
            End If
            If dtm = "2" Then
                dtm = "February"
            End If
            If dtm = "3" Then
                dtm = "March"
            End If
            If dtm = "4" Then
                dtm = "April"
            End If
            If dtm = "5" Then
                dtm = "May"
            End If
            If dtm = "6" Then
                dtm = "June"
            End If
            If dtm = "7" Then
                dtm = "July"
            End If
            If dtm = "8" Then
                dtm = "August"
            End If
            If dtm = "9" Then
                dtm = "September"
            End If
            If dtm = "10" Then
                dtm = "October"
            End If
            If dtm = "11" Then
                dtm = "November"
            End If
            If dtm = "12" Then
                dtm = "December"
            End If


            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Salary  where  vEmpid= '" & Trim(TextBox16.Text) & "" & "'  and vYear ='" & dt & "' and vMonth='" & dtm & "'"

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
                str_sql_user_select = "SELECT *  FROM Salary  where  vEmpid= '" & Trim(TextBox16.Text) & "" & "'  and  vYear ='" & dt & "' and vMonth='" & dtm & "'  "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                ro = 0
                While rowsOrder <> ro

                    While myAccessReader.Read()
                        stid = myAccessReader("vEmpid")

                        array_STId2(nos) = stid

                        Me.ListItems.Items.Add(myAccessReader(Trim("vEmpid") & ""))

                        nos += 1
                        ro += 1
                    End While

                End While

                strconss.Close()

            End If

            Call Cur()


            'e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)

            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            ' ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            If TextBox16.Text <> "" And TextBox4.Text <> "" Then
                e.Graphics.DrawString("EMPLOYEES  MONTHLY  SALARY  DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)


                ' e.Graphics.DrawString("EMPLOYEE MONTHLY SALARY  DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 90, _
                    .PaperSize.Width - .Margins.Right, Y + 90)
                End With


                For Each i As String In Me.ListItems.Items(itm).ToString

                    StudentId = Me.ListItems.Items(itm).ToString
                    Call conns()

                    str_sql_user_select = "SELECT  vStatus,dSalDate ,vFname, vSurname,vMidName,vEmpid,vGender,vPosition,vDepartStaffCode,vmodofpay,vpayStatus,msalary  FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'  and vYear ='" & dt & "' and vMonth='" & dtm & "' "

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()


                    While myAccessReader.Read

                        numbs_pay += 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 110)

                        e.Graphics.DrawString("EMPLOYEE ID : ", tablefont, Brushes.Black, X1 + 15, Y + 110)
                        e.Graphics.DrawString(myAccessReader("vEmpid"), titlefont, Brushes.Black, X1 + 150, Y + 110)


                        'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                        'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                        e.Graphics.DrawString("SURNAME : ", tablefont, Brushes.Black, X1 + 15, Y + 150)
                        e.Graphics.DrawString(myAccessReader("vSurname"), titlefont, Brushes.Black, X1 + 150, Y + 150)


                        e.Graphics.DrawString("FIRST NAME : ", tablefont, Brushes.Black, X1 + 15, Y + 190)
                        e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, X1 + 150, Y + 190)

                        ' e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 140)
                        'e.Graphics.DrawString(myreader("vSurname"), titlefont, Brushes.Black, CInt(X1) + 170, CInt(Y) + 140)


                        e.Graphics.DrawString("MIDDLE NAME : ", tablefont, Brushes.Black, X1 + 15, Y + 230)
                        e.Graphics.DrawString(myAccessReader("vMidName"), titlefont, Brushes.Black, X1 + 150, Y + 230)

                        e.Graphics.DrawString("GENDER : ", tablefont, Brushes.Black, X1 + 15, Y + 270)
                        e.Graphics.DrawString(myAccessReader("Vgender"), titlefont, Brushes.Black, X1 + 150, Y + 270)

                        e.Graphics.DrawString("PAYMENT DATE : ", tablefont, Brushes.Black, X1 + 15, Y + 310)
                        e.Graphics.DrawString(myAccessReader("dSalDate"), titlefont, Brushes.Black, X1 + 150, Y + 310)



                        e.Graphics.DrawString("SALARY : ", tablefont, Brushes.Black, X1 + 350, Y + 110)
                        e.Graphics.DrawString(Format(Val(myAccessReader("msalary"))), titlefont, Brushes.Black, X1 + 550, Y + 110)
                        If Trim(moni) & "" = "Cedis" Then
                            e.Graphics.DrawString("C", fntMoney, Brushes.Black, CInt(X1) + 530, CInt(YM) + 131)
                        End If
                        If Trim(moni) & "" = "Naira" Then
                            e.Graphics.DrawString("N", fntMoney, Brushes.Black, CInt(X1) + 530, CInt(YM) + 131)
                        End If


                        e.Graphics.DrawString("MODE OF PAYMENT : ", tablefont, Brushes.Black, X1 + 350, Y + 150)
                        e.Graphics.DrawString(myAccessReader("vmodofpay"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 150)

                        e.Graphics.DrawString("PAYMENT STATUS : ", tablefont, Brushes.Black, X1 + 350, Y + 190)
                        e.Graphics.DrawString(myAccessReader("vpayStatus"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 190)

                        e.Graphics.DrawString("POSITION CODE : ", tablefont, Brushes.Black, X1 + 350, Y + 230)
                        e.Graphics.DrawString(myAccessReader("vPosition"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 230)

                        e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, X1 + 350, Y + 270)
                        e.Graphics.DrawString(myAccessReader("vDepartStaffCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 270)

                        e.Graphics.DrawString("EMPLOYEE STATUS : ", tablefont, Brushes.Black, X1 + 350, Y + 310)
                        e.Graphics.DrawString(myAccessReader("vSTATUS"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 310)


                        If TextBox5.Text <> "" Then
                            e.Graphics.DrawString("AMOUNT IN WORD : ", tablefont, Brushes.Black, X1 + 15, Y + 350)
                            e.Graphics.DrawString(Me.TextBox5.Text, titlefont, Brushes.Black, X1 + 135, Y + 350)


                        End If


                        e.Graphics.DrawString("EMPLOYEE   SIGNATURE : ................................ ", tablefont, Brushes.Black, X1, Y + 400)

                        e.Graphics.DrawString("ACCOUNTANT   SIGNATURE : ............................... ", tablefont, Brushes.Black, X1 + 350, Y + 400)

                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 70

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

                        R8 = New Rectangle(70, 60, 660, 420)


                        'e.Graphics.DrawRectangle(Pens.Black, R4)
                        'e.Graphics.DrawRectangle(Pens.Black, R5)
                        'e.Graphics.DrawRectangle(Pens.Black, R6)
                        ' e.Graphics.DrawRectangle(Pens.Black, R7)

                        e.Graphics.DrawRectangle(J, 50, 45, 700, 450)
                        ' e.Graphics.DrawRectangle(I, 90, 300, 600, 190)


                        e.Graphics.DrawRectangle(Pens.Black, R8)




                        If Trim(moni) & "" = "Cedis" Then
                            '###### Cedis Currency

                            e.Graphics.DrawLine(P, 638, 132, 638, 150)
                            ' ######### end of Cedis Currency
                        End If
                        If Trim(moni) & "" = "Naira" Then
                            '###### Naira Currency
                            e.Graphics.DrawLine(B, 630, 140, 645, 140)


                            e.Graphics.DrawLine(C, 630, 142, 645, 142)
                            '###### End Naira Currency
                        End If


                        '###### end drawing here

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

    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click

        printNo = 1
        Dim Choices As String = ""
        Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

        If Choices = vbYes Then

            If TextBox16.Text = "" Then

                MsgBox("Employee Id Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If TextBox4.Text = "" Then

                MsgBox("Department Code Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If CheckBox1.Checked <> True Then
                MsgBox("Check Box Unclear Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If



            PrintBIll()
        End If
    End Sub
    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        printNo = 0
        If TextBox16.Text = "" Then

            MsgBox("Employee Id Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If

        If TextBox4.Text = "" Then

            MsgBox("Department Code Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If
        If CheckBox1.Checked <> True Then
            MsgBox("Check Box Unclear Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If

        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        PrintBIll()
    End Sub

    Private Sub PrintPreviewDialog1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintPreviewDialog1.Load

    End Sub
End Class
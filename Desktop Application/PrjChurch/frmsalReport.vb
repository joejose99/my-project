Imports System.Data.OleDb
Public Class frmsalReport



    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub

    Private Sub Label4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub
    Private _salM As String
    Private salsum As String
    Public Property EmpEditRP() As String
        Get
            Return _salM

        End Get
        Set(ByVal value As String)
            _salM = value


            TextBox1.Text = _salM
            ComboBox5.Text = ""
            ComboBox4.Text = ""


            Call calus()

        End Set

    End Property
    Private Sub calus()
        Try
            Dim rows As Integer
            Dim Years As String = ""
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT DISTINCT(vYear)AS [RecordYear]  FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'  "
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                Years = myAccessReader("RecordYear")
                rows += 1
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then


              
                Call conns()

                ComboBox5.Items.Clear()
                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                str_sql_user_select = "SELECT  DISTINCT(vYear)AS [RecordYear]FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    ComboBox5.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

                'requery()


              
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butpring1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butpring1.Click

        printNo = 1
        Dim Choices As String = ""
        Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

        If Choices = vbYes Then

            If TextBox1.Text = "" Then

                MsgBox("Employee Id Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If ComboBox4.Text = "" And ComboBox5.Text = "" Then

                MsgBox("both Month and Year Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If



            PrintBIll()
        End If
    End Sub

    Private Sub TextBox1_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox1.DoubleClick
        frmEmpsalpuup.MdiParent = mdiChurch
        frmEmpsalpuup.Show()
        frmEmpsalpuup.BringToFront()
        frmEmpsalpuup.WindowState = FormWindowState.Normal

    End Sub

    Private Sub TextBox1_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox1.TextChanged

    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer


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



    Private YM As Integer
    Private P, B, C, V As New Pen(Color.Black, 2)

    Private G, L As Graphics

    Private sBrush As SolidBrush
    Private M As SolidBrush
    Private R1, R3, R4, R5, R6, R7, R8 As Rectangle

    Private fntMoney As New Font("Arial", 13)
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        ' Private Y As Integer
        ' Dim X1 As Integer
        'Dim X2 As Integer
        'Dim W2 As Integer
        ' Dim str As String
        ' Private Yc As Integer
        Try
            Dim rowsOrder As Integer = 0
            Dim ro As Integer
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            'ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10




            str = ""
            Yc = 0
            lines = 0
            Cols = 0


            If ComboBox5.Text <> "" And ComboBox4.Text = "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   SALARY where  vEmpid = '" & TextBox1.Text & "' and vYear='" & ComboBox5.Text & "' "
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
                    str_sql_user_select = "SELECT *  FROM SALARY where vEmpid = '" & TextBox1.Text & "' and vYear='" & ComboBox5.Text & "' "

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

            End If



            If ComboBox5.Text <> "" And ComboBox4.Text <> "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   SALARY where  vEmpid= '" & Trim(TextBox1.Text) & "" & "'  and vMonth='" & ComboBox4.Text & "' and vYear='" & ComboBox5.Text & "'"
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
                    str_sql_user_select = "SELECT *  FROM SALARY where vEmpid= '" & Trim(TextBox1.Text) & "" & "'  and vMonth='" & ComboBox4.Text & "' and vYear='" & ComboBox5.Text & "'"

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

            End If



            Dim studentid As String = ""




            'e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)

            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)








            If ComboBox5.Text <> "" And ComboBox4.Text <> "" Then
                e.Graphics.DrawString("EMPLOYEES  MONTHLY  SALARY  DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)


                ' e.Graphics.DrawString("EMPLOYEE MONTHLY SALARY  DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                    .PaperSize.Width - .Margins.Right, Y + 95)
                End With


                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString
                    Call conns()



                    Call conns()

                    str_sql_user_select = "SELECT  vStatus,dSalDate ,vFname, vSurname,vMidName,vEmpid,vGender,vPosition,vDepartStaffCode,vmodofpay,vpayStatus,msalary  FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'  and vMonth ='" & ComboBox4.Text & "' and vYear='" & ComboBox5.Text & "'"

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
                        e.Graphics.DrawString(myAccessReader("dsalDate"), titlefont, Brushes.Black, X1 + 150, Y + 310)



                        e.Graphics.DrawString("SALARY : ", tablefont, Brushes.Black, X1 + 350, Y + 110)
                        e.Graphics.DrawString(Format(Val(myAccessReader("msalary"))), titlefont, Brushes.Black, X1 + 550, Y + 110)
                        e.Graphics.DrawString("C", fntMoney, Brushes.Black, CInt(X1) + 530, CInt(YM) + 131)

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

                        e.Graphics.DrawString("EMPLOYEE   SIGNATURE : ................................ ", tablefont, Brushes.Black, X1, Y + 370)

                        e.Graphics.DrawString("ACCOUNTANT   SIGNATURE : ............................... ", tablefont, Brushes.Black, X1 + 350, Y + 370)

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




                        e.Graphics.DrawLine(P, 638, 132, 638, 150)
                        'e.Graphics.DrawLine(B, 200, 450, 200, 350)
                        'e.Graphics.DrawLine(C, 600, 450, 600, 350)


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
                            'counts = 0
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







            If ComboBox5.Text <> "" And ComboBox4.Text = "" Then
                e.Graphics.DrawString("EMPLOYEES  YEARLY  SALARY  DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)

                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString
                    Call conns()



                    str_sql_user_select = "SELECT  dSalDate ,vFname, vEmpid,msalary,vSurname, vDepartStaffCode FROM Salary where vEmpid = '" & studentid & "' and vYear='" & ComboBox5.Text & "' "

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ' e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                    With PrintDocument1.DefaultPageSettings
                        e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                        .PaperSize.Width - .Margins.Right, Y + 95)
                    End With
                    While myAccessReader.Read

                        ' e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)

                        'If ro <> 0 Then
                        'X1 += 100
                        'Y += 25
                        'End If

                        numbs_pay += 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 110)

                        e.Graphics.DrawString("EMPLOYEE ID : ", tablefont, Brushes.Black, CInt(X1) + 25, CInt(Y) + 110)
                        e.Graphics.DrawString(myAccessReader("vEmpid"), titlefont, Brushes.Black, CInt(X1) + 130, CInt(Y) + 110)


                        'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                        'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                        e.Graphics.DrawString("SURNAME : ", tablefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 110)
                        e.Graphics.DrawString(myAccessReader("vSurname"), titlefont, Brushes.Black, CInt(X1) + 310, CInt(Y) + 110)


                        e.Graphics.DrawString("FIRST NAME : ", tablefont, Brushes.Black, CInt(X1) + 430, CInt(Y) + 110)
                        e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 110)

                        ' e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 140)
                        'e.Graphics.DrawString(myreader("vSurname"), titlefont, Brushes.Black, CInt(X1) + 170, CInt(Y) + 140)


                        e.Graphics.DrawString("DEPARTMENT ID : ", tablefont, Brushes.Black, CInt(X1) + 25, CInt(Y) + 130)
                        e.Graphics.DrawString(myAccessReader("vEmpid"), titlefont, Brushes.Black, CInt(X1) + 130, CInt(Y) + 130)

                        e.Graphics.DrawString("PAYMENT DATE : ", tablefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 130)
                        e.Graphics.DrawString(myAccessReader("dSalDate"), titlefont, Brushes.Black, CInt(X1) + 310, CInt(Y) + 130)


                        e.Graphics.DrawString("SALARY : ", tablefont, Brushes.Black, CInt(X1) + 430, CInt(Y) + 130)
                        e.Graphics.DrawString(Format(Val(myAccessReader("msalary"))), titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 130)



                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 35

                        ro += 1

                        count_pay += 1
                        ctr_pay += 1
                        itm += 1

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

                        If count_pay >= 8 Then
                            e.HasMorePages = True
                            counts_pay += count_pay

                            count_pay = 0
                            Exit Sub
                        Else
                            e.HasMorePages = False
                            'counts = 0
                        End If
                        If count_pay = 0 Then
                            e.HasMorePages = False
                        End If



                    End While


                Next
                If count_pay <> 8 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If



                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 100, _
                    .PaperSize.Width - .Margins.Right, Y + 100)
                End With

                e.Graphics.DrawString("GROUND TOTAL : ", tablefont, Brushes.Black, CInt(X1) + 310, CInt(Y) + 135)
                e.Graphics.DrawString(Format(Val(salsum)), titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 135)
                e.Graphics.DrawString("---------------", titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 140)

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

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub butReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butReset.Click
        Me.TextBox1.Text = ""
        Me.ComboBox4.Text = ""
        Me.ComboBox5.Text = ""
    End Sub

    Private Sub frmsalReport_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 367
        Me.Height = 197
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmsalReport_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 367
        Me.Height = 197
        Me.MdiParent = mdiChurch
        Me.TextBox1.Text = ""
        Me.ComboBox4.Text = ""
        Me.ComboBox5.Text = ""

    End Sub

    Private Sub PrintPreviewDialog1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintPreviewDialog1.Load

    End Sub

    Private Sub Panel1_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Panel1.Click
        Me.BringToFront()
    End Sub

    Private Sub Panel1_Paint(ByVal sender As System.Object, ByVal e As System.Windows.Forms.PaintEventArgs) Handles Panel1.Paint

    End Sub
    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click

        printNo = 0
        If TextBox1.Text = "" Then

            MsgBox("Employee Id Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If

        If ComboBox4.Text = "" And ComboBox5.Text = "" Then

            MsgBox("both Month and Year Can not be Empty", MsgBoxStyle.Information, "Information")
            Exit Sub
        End If

        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        PrintBIll()

    End Sub

    Private Sub ComboBox5_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox5.SelectedIndexChanged
        Try
            Dim rows As Integer
            Dim Years As String = ""

            Call conns()
            str_sql_user_select = "SELECT DISTINCT(vYear)AS [RecordYear]  FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "' and  vYear ='" & ComboBox5.Text & "'   "
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                Years = myAccessReader("RecordYear")
                rows += 1
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then
                Call conns()

                ComboBox4.Items.Clear()
                ComboBox4.Text = ""
                str_sql_user_select = "SELECT DISTINCT(vMonth)AS [RecordYear]  FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "' and vYear ='" & ComboBox5.Text & "'  "


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    ComboBox4.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

                Call conns()


                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                str_sql_user_select = "SELECT  SUM(MSALARY)AS [SALARY]FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "' and  vYear ='" & ComboBox5.Text & "'"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    salsum = (myAccessReader(Trim("SALARY") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
           
    End Sub

    Private Sub ComboBox4_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox4.SelectedIndexChanged
        Try
            Dim rows As Integer
            Dim Years As String = ""
            Call conns()
            str_sql_user_select = "SELECT DISTINCT(vYear)AS [RecordYear]  FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "' and  vYear ='" & ComboBox5.Text & "'  and vMonth ='" & ComboBox4.Text & "'  "
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                Years = myAccessReader("RecordYear")
                rows += 1
            End While
            myAccessReader.Close()
            strconss.Close()
            Dim ro As Integer
            If rows <> 0 Then
                Call conns()


                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                str_sql_user_select = "SELECT  SUM(MSALARY)AS [SALARY]FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    salsum = (myAccessReader(Trim("SALARY") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
End Class
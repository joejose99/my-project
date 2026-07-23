Imports System.Data.OleDb
Public Class frmsalYearRep
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

    Private Sub Panel1_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Panel1.Click
        Me.BringToFront()
    End Sub
    Private Sub Panel1_Paint(ByVal sender As System.Object, ByVal e As System.Windows.Forms.PaintEventArgs) Handles Panel1.Paint

    End Sub
    Private salsum As String

    Private Sub frmsalYearRep_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100

        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmsalYearRep_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub
    Private Sub frmsalYearRep_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.Left = 0
            Me.Top = 100
            Dim ro As Integer
            Dim Years As String
            Me.MdiParent = mdiChurch


            Call conns()
            str_sql_user_select = " SELECT DISTINCT(vYear)AS [RecordYear]  FROM Salary "
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim rows As Integer
            While myAccessReader.Read
                Years = myAccessReader("RecordYear")
                rows = +1
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then

                Call conns()



                ComboBox2.Items.Clear()

               

                Call conns()

                ComboBox1.Items.Clear()
                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                str_sql_user_select = "SELECT  DISTINCT(vYear)AS [RecordYear]FROM Salary "


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    ComboBox1.Items.Add(myAccessReader(Trim("RecordYear") & ""))

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

    Private Sub butprint2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butprint2.Click
        Try

            printNo = 1
            Dim Choices As String = ""
            Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

            If Choices = vbYes Then

                If ComboBox1.Text = "" Then

                    MsgBox("Year Can not be Empty", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                'If ComboBox2.Text = "" Then

                'MsgBox("Month Can not be Empty", MsgBoxStyle.Information, "Information")
                ' Exit Sub
                ' End If
                Call conns()


                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"
                If ComboBox2.Text <> "" And ComboBox1.Text <> "" Then
                    str_sql_user_select = "SELECT  SUM(MSALARY)AS [SALARY]FROM Salary WHERE vMonth='" & ComboBox2.Text & "' and vYear='" & ComboBox1.Text & "'"


                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    Dim ro As Integer = 0
                    While myAccessReader.Read()

                        salsum = (myAccessReader(Trim("SALARY") & ""))

                        ro += 1

                    End While
                    strconss.Close()
                    myAccessReader.Close()

                End If

                If ComboBox2.Text = "" And ComboBox1.Text <> "" Then
                    str_sql_user_select = "SELECT  SUM(MSALARY)AS [SALARY]FROM Salary WHERE  vYear='" & ComboBox1.Text & "'"


                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    Dim ro As Integer = 0
                    While myAccessReader.Read()

                        salsum = (myAccessReader(Trim("SALARY") & ""))

                        ro += 1

                    End While
                    strconss.Close()
                    myAccessReader.Close()

                End If


                PrintBIll()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        ' Private Y As Integer
        ' Dim X1 As Integer
        'Dim X2 As Integer
        'Dim W2 As Integer
        ' Dim str As String
        ' Private Yc As Integer
        Try
            Dim ro As Integer
            Dim rowsOrder As Integer = 0
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

            If ComboBox1.Text <> "" And ComboBox2.Text = "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM Salary WHERE   vYear='" & ComboBox1.Text & "'"
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



                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *  FROM Salary WHERE  vYear='" & ComboBox1.Text & "'"

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

            If ComboBox1.Text <> "" And ComboBox2.Text <> "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM Salary WHERE vMonth='" & ComboBox2.Text & "' and vYear='" & ComboBox1.Text & "'"
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



                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *  FROM Salary WHERE vMonth='" & ComboBox2.Text & "' and vYear='" & ComboBox1.Text & "'"

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

            ' ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10


            If ComboBox1.Text <> "" And ComboBox2.Text <> "" Then
                e.Graphics.DrawString("ALL EMPLOYEES MONTHLY SALARY DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)

                ' e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                    .PaperSize.Width - .Margins.Right, Y + 95)
                End With


                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString
                    Call conns()



                    str_sql_user_select = "SELECT  dSalDate,vMonth,vYear ,vFname, vEmpid,msalary,vSurname, vDepartStaffCode FROM Salary WHERE vMonth='" & ComboBox2.Text & "' and vYear ='" & ComboBox1.Text & "' and vEmpid= '" & studentid & "'"

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
                        e.Graphics.DrawString(myAccessReader("vDepartStaffCode"), titlefont, Brushes.Black, CInt(X1) + 130, CInt(Y) + 130)

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

                e.Graphics.DrawString("GROUND TOTAL : ", tablefont, Brushes.Black, CInt(X1) + 310, CInt(Y) + 130)
                e.Graphics.DrawString(Format(Val(salsum)), titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 130)
                e.Graphics.DrawString("---------------", titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 140)

                myAccessReader.Close()
                strconss.Close()
            End If


            If ComboBox1.Text <> "" And ComboBox2.Text = "" Then
                e.Graphics.DrawString("ALL EMPLOYEES YEARLY SALARY DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)

                ' e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                    .PaperSize.Width - .Margins.Right, Y + 95)
                End With


                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString
                    Call conns()



                    str_sql_user_select = "SELECT  dSalDate,vMonth,vYear ,vFname, vEmpid,msalary,vSurname, vDepartStaffCode FROM Salary WHERE  vYear ='" & ComboBox1.Text & "' and vEmpid= '" & studentid & "'"

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
                        e.Graphics.DrawString(myAccessReader("vDepartStaffCode"), titlefont, Brushes.Black, CInt(X1) + 130, CInt(Y) + 130)

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

                e.Graphics.DrawString("GROUND TOTAL : ", tablefont, Brushes.Black, CInt(X1) + 310, CInt(Y) + 130)
                e.Graphics.DrawString(Format(Val(salsum)), titlefont, Brushes.Black, CInt(X1) + 530, CInt(Y) + 130)
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

    Private Sub butReset1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butReset1.Click
        Me.ComboBox1.Text = ""
        Me.ComboBox2.Text = ""
    End Sub

    Private Sub PrintPreviewDialog1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintPreviewDialog1.Load

    End Sub

    Private Sub ComboBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.SelectedIndexChanged
        Try
            Call conns()
            Dim Years As String
            ComboBox2.Items.Clear()
            ComboBox2.Text = ""
            Call conns()
            str_sql_user_select = " SELECT DISTINCT(vMonth)AS [RecordYear]  FROM Salary  where  vYear ='" & ComboBox1.Text & "'"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim rows As Integer
            While myAccessReader.Read
                Years = myAccessReader("RecordYear")
                rows += 1
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then

                Call conns()



                ComboBox2.Items.Clear()


                str_sql_user_select = "SELECT DISTINCT(vMonth)AS [RecordYear]  FROM Salary where  vYear ='" & ComboBox1.Text & "' "


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()

                    ComboBox2.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

                ComboBox2.Enabled = True
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Try
            printNo = 0
            If ComboBox1.Text = "" Then

                MsgBox("Year Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            '  If ComboBox2.Text = "" Then

            'MsgBox("Month Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If
            Call conns()


            'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

            If ComboBox2.Text <> "" And ComboBox1.Text <> "" Then
                str_sql_user_select = "SELECT  SUM(MSALARY)AS [SALARY]FROM Salary WHERE vMonth='" & ComboBox2.Text & "' and vYear='" & ComboBox1.Text & "'"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()

                    salsum = (myAccessReader(Trim("SALARY") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

            End If

            If ComboBox2.Text = "" And ComboBox1.Text <> "" Then
                str_sql_user_select = "SELECT  SUM(MSALARY)AS [SALARY]FROM Salary WHERE  vYear='" & ComboBox1.Text & "'"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()

                    salsum = (myAccessReader(Trim("SALARY") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

            End If



            PrintPreviewDialog1.Width = 1500
            PrintPreviewDialog1.Height = 1200
            PrintPreviewDialog1.AutoSizeMode = False
            PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


            PrintBIll()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox2_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox2.SelectedIndexChanged

    End Sub
End Class